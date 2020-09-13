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




Route::get('/','FontController@index');
Route::get('/all_products/{id}','FontController@index_product');


Route::get('/login','admin\adminController@login');
Route::get('/logout','admin\adminController@logout');
Route::get('/customerlogin','admin\adminController@customerlog');
Route::get('/register','admin\adminController@register');
Route::post('/register','admin\adminController@registation');
Route::get('/forget','admin\adminController@forget');
Route::get('/forgetpass','admin\adminController@forgetpass');

Route::get('/dashboard','admin\adminController@admin');
Route::get('/customer','admin\adminController@customer');

Route::get('/slider','admin\mainController@slider');
Route::post('/slider/store','admin\mainController@slider_store');
Route::get('/slider/edit/{id}','admin\mainController@slider_edit');
Route::post('/slider/update','admin\mainController@slider_update');

Route::get('/category','admin\mainController@category');
Route::post('/category/store','admin\mainController@category_store');
Route::get('/category/edit/{id}','admin\mainController@category_edit');
Route::get('/category/delete/{id}','admin\mainController@category_delete');
Route::post('/category/update','admin\mainController@category_update');

Route::get('/product','admin\mainController@product');
Route::post('/product/store','admin\mainController@product_store');
Route::get('/product/edit/{id}','admin\mainController@product_edit');
Route::get('/product/delete/{id}','admin\mainController@product_delete');
Route::post('/product/update','admin\mainController@product_update');

Route::get('/package','admin\mainController@package');
Route::post('/package/store','admin\mainController@package_store');
Route::get('/package/edit/{id}','admin\mainController@package_edit');
Route::post('/package/update','admin\mainController@package_update');

Route::get('/customer_order','admin\OrderController@customer_order');

Route::get('/cart','admin\OrderController@cart');

Route::get('/shipping','admin\OrderController@shipping');
Route::post('/shipping/store','admin\OrderController@shipping_store');

Route::get('/payment','admin\OrderController@payment');
Route::post('/payment/store','admin\OrderController@payment_store');

Route::get('/loged','admin\OrderController@loged');
Route::get('/shiplogin','admin\OrderController@shiplogin');
Route::get('/registered','admin\OrderController@registered');
Route::post('/registereds','admin\OrderController@registereds');

Route::get('/addtocart','admin\OrderController@addtocart')->name('Cart');
Route::get('/cartupdate','admin\OrderController@cartupdates');
Route::get('/deletecart/{id}','admin\OrderController@deletecart');

Route::get('/pending','admin\ManageController@pending');
Route::get('/approve','admin\ManageController@approve');
Route::get('/shipment','admin\ManageController@shipment');
Route::get('/success','admin\ManageController@success');
Route::get('/cancel','admin\ManageController@cancel');
Route::get('/pending/edit/{id}','admin\ManageController@pending_edit');
Route::post('/pending/update','admin\ManageController@pending_update');
Route::get('/order/view/{id}','admin\ManageController@pending_view');
Route::get('/invoice/view/{id}','admin\ManageController@invoice_view');

Route::get('/todaysale','admin\ManageController@todaysale');
Route::get('/sale','admin\ManageController@sale');
