<?php

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

Route::get('index', 'pageController@getIndex')->name('trang-chu');
Route::get('loaisp/{id}', 'pageController@getLoaisp')->name('loaisp');
Route::get('chitiet-sanpham/{id}', 'pageController@getSanpham')->name('chitiet-sanpham');
Route::get('lienhe', 'pageController@getLienhe')->name('lienhe');
Route::get('gioithieu', 'pageController@getGioithieu')->name('gioithieu');
Route::get('add-to-cart/{id}', 'pageController@getAddToCart')->name('add-to-cart');
Route::get('remove-item/{id}', 'pageController@getRemoveFromCart')->name('remove-item');
Route::get('checkout','pageController@getCheckout')->name('checkout');
Route::post('postCheckout','pageController@postCheckout')->name('postCheckout');