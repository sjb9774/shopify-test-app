<?php


namespace App\Http\Controllers;


use App\Models\Config;
use App\Models\Shop;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function updateCartMessage(Request $request)
    {
        $data = $request->json();
        $shopName = $data->get('shop');
        $shop = Shop::where('shop', $shopName)->first();
        if (!$shop) {
            return response()->json(
                [
                    'success' => false,
                    'message' => "Store '$shopName' not found"
                ],
                500
            );
        }

        $config = Config::where('shop_id', $shop['id'])->where('name', 'cart_message')->first();
        if (!$config) {
            $config = new Config();
            $config->name = 'cart_message';
            $config->shop_id = $shop['id'];
        }
        $config->value = $data->get('message');
        $config->save();


        return response()->json(
            [
                'result' => 'success'
            ]
        );
    }

    public function getCartMessage(Request $request)
    {
        $shopName = $request->get('shop');
        $shop = Shop::where('shop', $shopName)->first();
        $config = Config::where('shop_id', $shop['id'])->where('name', 'cart_message')->first();
        $value = null;
        if ($config) {
            $value = $config->value;
        }
        return response()->json(
            [
                'success' => true,
                'message' => $value
            ]
        );
    }
}