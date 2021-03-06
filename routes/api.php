<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('widget', 'WidgetController@index');
Route::post('api-store-visitor-count', 'ApiStoreVisitorController@index');

Route::post('api-email', 'ApiEmailController@index');
Route::post('api-friend-email', 'ApiFriendEmailController@index');
Route::post('api-feedback-rating', 'ApiFeedbackController@index');
Route::post('api-product-count', 'ApiProductCountController@index');
Route::post('api-tracking', 'ApiTrackingController@index');
