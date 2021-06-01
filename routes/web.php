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

// Route::get('/register', 'Auth\AuthController@register')->name('register');
// Route::post('/register', 'Auth\AuthController@storeUser');

Route::get('/login', 'Auth\AuthController@login')->name('login');
Route::post('/login', 'Auth\AuthController@authenticate');
Route::get('logout', 'Auth\AuthController@logout')->name('logout');

Route::resource('dashboard','DashboardController')->middleware('auth');
Route::resource('stores','StoreController')->middleware('auth');
Route::resource('brands','BrandController')->middleware('auth');
Route::resource('products','ProductController')->middleware('auth');
Route::resource('/visitor-count','StoreVisitorCountController')->middleware('auth');
Route::resource('/visitor-times','StoreVisitorTimeController')->middleware('auth');
Route::resource('/email-count','EmailCountController')->middleware('auth');
Route::resource('/product-count','ProductCountController')->middleware('auth');
Route::resource('/feedback','FeedbackController')->middleware('auth');
Route::resource('/email-list','EmailListController')->middleware('auth');



Route::get('get-brands','GetBrandsController@index');
Route::post('product-sortable','ProductController@drogupdate');


