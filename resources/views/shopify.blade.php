<!DOCTYPE html>
<html>
    <head>
        <script src="https://unpkg.com/@shopify/app-bridge"></script>
        <script>
            var AppBridge = window['app-bridge'];
            var actions = window['app-bridge'].actions;
            var createApp = AppBridge.createApp;
            var Redirect = actions.Redirect;

            // calling createApp outside of an iframe will automatically redirect to the Shopify admin at the "/auth"
            // endpoint (since that's where this view is rendered) so we need to again redirect to "/" after that
            // redirect resolves and the "/auth" page within the embedded iframe in the Shopify admin
            var app = createApp({
                'apiKey': '{{ env('API_PUBLIC_KEY') }}',
                'shopOrigin': AppBridge.getShopOrigin()
            });
            if (app) {
                app.dispatch(Redirect.toApp({'path': '/'}));
            }
        </script>
    </head>
</html>