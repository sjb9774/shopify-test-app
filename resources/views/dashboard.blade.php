<!DOCTYPE html>
<html>
    <head>
        <script src="https://unpkg.com/@shopify/app-bridge"></script>
        <script src="https://unpkg.com/@shopify/app-bridge-utils"></script>
        <link rel="stylesheet"
              href="https://unpkg.com/@shopify/polaris@5.10.1/dist/styles.css" />
        <script>
            var AppBridge = window['app-bridge'];
            var actions = window['app-bridge'].actions;
            var AppBridgeUtils = window['app-bridge-utils'];
            var createApp = AppBridge.createApp;
            var Redirect = actions.Redirect;

            var app = createApp({
                'apiKey': '{{ env('API_PUBLIC_KEY') }}',
                'shopOrigin': AppBridge.getShopOrigin()
            });

            const AuthFetchFactory = AppBridgeUtils.authenticatedFetch;
            const Toast = actions.Toast;
            const updatedToast = Toast.create(app, {
                message: 'Cart message updated!',
                duration: 3000
            });
            const failedToast = Toast.create(app, {
                message: 'Cart message could not be updated',
                duration: 3000
            });
            document.addEventListener("DOMContentLoaded", function (evt) {
                let authFetch = AuthFetchFactory(app);
                authFetch('/getCartMessage?shop=' + AppBridge.getShopOrigin()).then(response => response.json()).then(function (json) {
                    document.querySelector('#cart_message_input').value = json.message;
                });
                document.querySelector('#submit_button').addEventListener('click', function (evt) {
                    var cartMessageInput = document.querySelector('#cart_message_input');
                    var csrf = document.querySelector('meta#csrf_token').getAttribute('content');
                    if (cartMessageInput.value) {
                        let authFetch = AuthFetchFactory(app);
                        authFetch('/updateCartMessage', {
                            method: 'POST',
                            headers: {
                                'Content-type': 'application/json',
                                'X-CSRF-TOKEN': csrf
                            },
                            body: JSON.stringify({
                                message: cartMessageInput.value,
                                shop: AppBridge.getShopOrigin()
                            })
                        }).then((response) => {
                            if (response.ok) {
                                return response.json()
                            }
                            throw new Error('Failed request');
                        }).then(updatedToast.dispatch(Toast.Action.SHOW))
                        .catch(error => failedToast.dispatch(Toast.Action.SHOW));
                    }
                });
            });
        </script>
        <meta id="csrf_token" content="{{ csrf_token() }}"/>
    </head>
    <body>
        <div class="Polaris-Page">
            <div class="Polaris-Page-Header Polaris-Page-Header--separator">
                <div class="Polaris-Page-Header__MainContent">
                    <h1 class="Polaris-DisplayText Polaris-DisplayText--sizeLarge">Hosted App Dashboard</h1>
                </div>
            </div>

            <div class="Polaris-Page__Content">
                <div class="Polaris-Layout">
                    <div class="Polaris-Layout__AnnotatedSection">
                        <div class="Polaris-Layout__AnnotationWrapper">
                            <div class="Polaris-Layout__Annotation">
                                <div class="Polaris-TextContainer">
                                    <h2 class="Polaris-Heading">Custom Cart Message</h2>
                                    <p>Add a friendly greeting to your cart</p>
                                </div>
                            </div>
                            <div class="Polaris-Layout__AnnotationContent">
                                <div class="Polaris-Card">
                                    <div class="Polaris-Card__Section">
                                        <div class="Polaris-FormLayout">
                                            <div role="group">
                                                <div class="Polaris-FormLayout__Items">
                                                    <div class="Polaris-FormLayout__Item">
                                                        <div>
                                                            <div class="Polaris-Labelled__LabelWrapper">
                                                                <div class="Polaris-Label">
                                                                    <label class="Polaris-Label__Text" id="cart_message_label" for="cart_message_input">
                                                                        Cart Message
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="Polaris-TextField">
                                                                <input id="cart_message_input" value="" placeholder="Thanks for shopping with us!" class="Polaris-TextField__Input"/>
                                                                <div class="Polaris-TextField__Backdrop"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="Polaris-FormLayout__Item">
                                                <button type="button" id="submit_button" class="Polaris-Button Polaris-Button--primary">
                                                    <span class="Polaris-Button__Content">
                                                        <span>Submit</span>
                                                    </span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>