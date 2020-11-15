<?php


namespace App\Http\Middleware;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use PHPShopify;
use Closure;

class ShopifyVerify
{
    public function handle(Request $request, Closure $next)
    {
        try {
            $validRequest = PHPShopify\AuthHelper::verifyShopifyRequest();
            if (!$validRequest) {
                Log::error("Request to {$request->getUri()} could not be verified");
                return response('Could not verify request',403);
            }
        } catch (PHPShopify\Exception\SdkException $err) {
            // invalid request in one way or another
            Log::error("Request to {$request->getUri()} could not be verified due to error: '{$err->getMessage()}'");
            return response('Could not verify request',403);
        }
        return $next($request);

    }

}