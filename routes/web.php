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

Route::get('/', 'HomeController@index')->name('home');
Route::get('/user', 'UsersController@index');
Route::get('/resturant','ResturantController@index')->name('resturant');
Route::get('/order','OrderController@index');
Route::post('/order','OrderController@store');
Route::put('/order/{id}','OrderController@update');
Route::get('/order_items/{id}','OrderItemController@index');
Route::get('/items/{id}','ResturantItemsController@index')->name('Item');
Route::get('delivery_cronjob','OrderController@messageCronjob');