<?php


namespace App\Http\Middleware;


use Illuminate\Http\Request;
use PHPShopify\ShopifySDK;
use Closure;
use App\Models\Shop;

class ConfigureShopify
{
    public function handle(Request $request, Closure $next)
    {

        $shopName = $request->get('shop');
        $publicKey = env('API_PUBLIC_KEY');
        $privateKey = env('API_PRIVATE_KEY');

        $config = [
            "ShopUrl" => $shopName,
            "ApiKey" => $publicKey,
            "SharedSecret" => $privateKey
        ];
        $shop = $this->getShop($shopName);
        if ($shop && $shop->access_token) {
            $config['AccessToken'] = $shop->access_token;
        }

        ShopifySDK::config($config);
        return $next($request);
    }

    protected function getShop($shopName)
    {
        return Shop::where('shop', $shopName)->first();
    }
}