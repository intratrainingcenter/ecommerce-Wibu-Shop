<?php

// Route::get('/', function () {
//     return view('frontend.produck');
// });
Route::get('/', function () {
    return view('Backend.Dashboard.index');
});
Route::post('paypal', 'PaymentController@payWithpaypal');
// route for check status of the payment
Route::get('status', 'PaymentController@getPaymentStatus');

// forntend
Route::get('/','FrontendControler@Index')->name('frontend.home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('user','UserController');
Route::resource('produk', 'ProdukController');
