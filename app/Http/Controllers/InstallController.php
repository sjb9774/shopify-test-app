<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PHPShopify;
use App\Models\Shop;
use Illuminate\Support\Facades\Http;


class InstallController extends Controller
{

    /**
     * @var string[]
     */
    protected $authChecks = ["compareNonce", "compareHmac", "isValidHostname"];

    /**
     * @var \Illuminate\Contracts\Routing\UrlGenerator
     */
    protected $urlGenerator;

    /**
     * InstallController constructor.
     * @param \Illuminate\Contracts\Routing\UrlGenerator $urlGenerator
     */
    public function __construct(\Illuminate\Contracts\Routing\UrlGenerator $urlGenerator)
    {
        $this->urlGenerator = $urlGenerator;
    }

    public function shopifyMain(Request $request)
    {
        if (isset(PHPShopify\ShopifySDK::$config['AccessToken'])) {
            return redirect(
                $this->urlGenerator->route(
                    'dashboard',
                    $request->all()
                ),
            );
        } else {
            return redirect(
                $this->urlGenerator->route(
                    'install',
                    $request->all()
                )
            );
        }
    }

    public function dashboard(Request $request)
    {
        return view('dashboard');
    }

    /**
     * Shopify makes a request to this endpoint to determine the app's identity, required resources, and the redirect
     * path so it can advise the merchant appropriately before beginning the OAuth flow
     *
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function install(Request $request)
    {
        $scopes = 'read_script_tags,write_script_tags,write_orders';
        $redirect = $this->urlGenerator->route('auth_redirect');

        $url = PHPShopify\AuthHelper::createAuthRequest($scopes, $redirect, null, null, true);

        return redirect($url);
    }

    protected function registerUninstallWebhook($shopName, $accessToken)
    {
        $response = Http::withHeaders([
            'X-Shopify-Access-Token' => $accessToken
        ])->post("https://{$shopName}/admin/api/2020-07/webhooks.json",
            [
                'webhook' => [
                    'topic' => 'app/uninstalled',
                    'address' => $this->urlGenerator->route('uninstallHook'),
                    'format' => 'json'
                ]
            ]
        );
        return $response->status() >= 200 && $response->status() < 300;
    }

    public function uninstall(Request $request)
    {
        $shop = PHPShopify\ShopifySDK::$config['ShopUrl'];
        $shop = Shop::where('shop', $shop)->first();
        if ($shop) {
            $shop->delete();
        }
        return response('', 200);
    }

    /**
     * After reviewing the required access from \App\Http\Controllers\InstallController::install, Shopify will redirect
     * here and ask us to authenticate the shop's identity (comparing nonce and HMAC). Once we've done that we request
     * a permanent access token for us to store and use for Shopify API requests for this shop going forward
     *
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function auth(Request $request)
    {
        $shopName = $request->get('shop');

        if (!isset(PHPShopify\ShopifySDK::$config['AccessToken'])) {
            $accessToken = PHPShopify\AuthHelper::getAccessToken();
            $this->registerUninstallWebhook($shopName, $accessToken);

            $shopModel = new Shop();
            $shopModel->shop = $shopName;
            $shopModel->access_token = $accessToken;
            $shopModel->save();

            return view('shopify');
        }
        return view('shopify');
    }

    /**
     * @param Request $request
     * @return bool
     */
    protected function isAuthRequestValid(Request $request)
    {
        $result = true;
        foreach ($this->authChecks as $authCheckMethodName) {
            if (method_exists($this, $authCheckMethodName)) {
                $result = call_user_func([$this, $authCheckMethodName], $request) && $result;
            }
        }
        return $result;
    }

    /**
     * @param Request $request
     * @return bool
     */
    protected function compareNonce(Request $request)
    {
        return $request->get('state') === $this->getInstallNonce();
    }

    /**
     * @param Request $request
     * @return bool
     */
    protected function compareHmac(Request $request)
    {
        $givenHmacValue = $request->get('hmac');
        $allParameters = $request->all();
        // the query string minus the HMAC value should digest to the HMAC value
        unset($allParameters['hmac']);
        // reconstruct query string without HMAC
        ksort($allParameters);
        $queryString = $this->constructUrlParams($allParameters);
        $calculatedHmacValue = hash_hmac('sha256', $queryString, env('SHARED_SECRET'));
        return hash_equals($calculatedHmacValue, $givenHmacValue);

    }

    /**
     * @param Request $request
     * @return bool
     */
    protected function isValidHostname(Request $request)
    {
        // provided in Shopify docs: https://shopify.dev/tutorials/authenticate-with-oauth#step-3-confirm-installation
        // Had to modify to make the protocol optional since it isn't actually included in the responses
        $hostnameRegex = '/(?:(https|http)\:\/\/)?[a-zA-Z0-9][a-zA-Z0-9\-]*\.myshopify\.com[\/]?/';
        return (bool)preg_match($hostnameRegex, $request->get('shop'));
    }

    /**
     * @param string $baseUrl
     * @param array $queryArgs
     * @return string
     */
    protected function constructUrl(string $baseUrl, array $queryArgs = [])
    {
        $url = $baseUrl;
        if (!empty($queryArgs)) {
            $url = "$url?{$this->constructUrlParams($queryArgs)}";
        }
        return $url;
    }

    /**
     * @param array $queryArgs
     * @return string
     */
    protected function constructUrlParams(array $queryArgs)
    {
        $args = [];
        foreach ($queryArgs as $key => $value ) {
            $args[] = "{$key}={$value}";
        }
        return implode('&', $args);
    }

    /**
     * @return string
     */
    protected function getInstallNonce()
    {
        return 'MY-PLACEHOLDER-NONCE'; // TODO: nonce should be unique and randomly generated
    }
}
