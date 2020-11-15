<!DOCTYPE html>
<html>
    <head>
        <script src="https://unpkg.com/@shopify/app-bridge"></script>
        <script>
            var AppBridge = window['app-bridge'];
            var actions = window['app-bridge'].actions;

            var app = AppBridge.default({
                'apiKey': '{{ env('API_PUBLIC_KEY') }}',
                'shopOrigin': AppBridge.getShopOrigin()
            });
        </script>
    </head>
    <body>
        <h1>Shopify Dashboard</h1>
    </body>
</html>