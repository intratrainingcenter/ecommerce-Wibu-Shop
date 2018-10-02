<?php
Route::get('/', function () {
    return view('Backend.Dashboard.index');
});
Route::post('paypal', 'PaymentController@payWithpaypal');
// route for check status of the payment
Route::get('status', 'PaymentController@getPaymentStatus');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('user','UserController');
Route::put('user/aktif/{kode_user}','UserController@Aktif')->name('Aktif');
Route::put('user/nonaktif/{kode_user}','UserController@nonAktif')->name('nonAktif');
