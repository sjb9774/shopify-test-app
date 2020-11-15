<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::middleware([\App\Http\Middleware\ShopifyVerify::class])->group(function() {
    Route::get('shopify', [\App\Http\Controllers\InstallController::class, 'shopifyMain']);
    Route::get('example', [\App\Http\Controllers\ViewController::class, 'example']);
    Route::get('dashboard', [\App\Http\Controllers\InstallController::class, 'dashboard'])->name('dashboard');
    Route::get('install', [\App\Http\Controllers\InstallController::class, 'install'])->name('install');
    Route::get('auth', [\App\Http\Controllers\InstallController::class, 'auth'])->name('auth_redirect');
    Route::post('uninstall', [\App\Http\Controllers\InstallController::class, 'uninstall'])->name('uninstallHook');
});

Route::middleware([\App\Http\Middleware\AppBridgeVerify::class])->group(function () {
    Route::post('updateCartMessage', [\App\Http\Controllers\ServiceController::class, 'updateCartMessage']);
    Route::get('getCartMessage', [\App\Http\Controllers\ServiceController::class, 'getCartMessage']);
});
