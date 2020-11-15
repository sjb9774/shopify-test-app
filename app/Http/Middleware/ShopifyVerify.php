<?php


namespace App\Http\Middleware;


use Illuminate\Http\Request;
use PHPShopify;
use Closure;

class ShopifyVerify
{
    public function handle(Request $request, Closure $next)
    {
        try {
            $validRequest = PHPShopify\AuthHelper::verifyShopifyRequest();
            if (!$validRequest) {
                return response('Could not verify request',403);
            }
        } catch (PHPShopify\Exception\SdkException $err) {
            // invalid request in one way or another
            return response('Could not verify request',403);
        }
        return $next($request);

    }

}