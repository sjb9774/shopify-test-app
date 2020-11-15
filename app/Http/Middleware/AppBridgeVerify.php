<?php


namespace App\Http\Middleware;


use Illuminate\Http\Request;
use PHPShopify;
use Closure;
use Firebase\JWT\JWT;

class AppBridgeVerify
{
    public function handle(Request $request, Closure $next)
    {
        $token = $request->header('Authorization');
        $token = explode(' ', $token)[1];
        try {
            $decoded = JWT::decode($token, env('API_PRIVATE_KEY'), ['HS256']);
        } catch (\Firebase\JWT\SignatureInvalidException $err) {
            return response()->json([
                'success' => false,
                'message' => 'Request signature invalid'
            ], 401);
        } catch (\Firebase\JWT\ExpiredException $err) {
            return response()->json([
                'success' => false,
                'message' => 'Expired auth token'
            ], 401);
        }

        if (!$this->assertValues($decoded)) {
            return response()->json([
               'success' => false,
               'message' => 'Could not authenticate with app'
            ], 401);
        }

        return $next($request);
    }

    protected function assertValues($jwtPayload)
    {
        if ($jwtPayload->aud !== env('API_PUBLIC_KEY')) {
            return false;
        }

        return true;
    }

}