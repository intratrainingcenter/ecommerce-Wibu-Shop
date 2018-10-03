<?php

// Route::get('/', function () {
//     return view('frontend.produck');
// });
Route::get('/Dashboard', function () {
    return view('Backend.Dashboard.index');
});
Route::post('paypal', 'PaymentController@payWithpaypal');
// route for check status of the payment
Route::get('status', 'PaymentController@getPaymentStatus');

// forntend
Route::get('/','FrontendControler@Index')->name('frontend.home');
Route::get('/shop-product-list','FrontendControler@product_list')->name('frontend.product_list');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('user','UserController');
Route::resource('produk', 'ProdukController');
