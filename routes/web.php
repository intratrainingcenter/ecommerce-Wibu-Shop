<?php
Route::get('/dashboard','HomeController@index')->name('dashboard');
Route::get('/Profile/{kode_user}','HomeController@Profile')->name('Profile');
Route::post('paypal', 'PaymentController@payWithpaypal');
// route for check status of the payment
Route::get('status', 'PaymentController@getPaymentStatus');

// forntend
Route::get('/','FrontendControler@Index')->name('frontend.home');
Route::get('/shop-product-list','FrontendControler@product_list')->name('frontend.product_list');
Route::get('/shop-checkout','FrontendControler@Checkout')->name('frontend.Checkout');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::put('user/aktif/{kode_user}','UserController@Aktif')->name('Aktif');
Route::put('user/nonaktif/{kode_user}','UserController@nonAktif')->name('nonAktif');
Route::resource('user','UserController');
Route::resource('produk', 'ProdukController');


Route::get('/keuangan','KeuanganController@Index')->name('LaporanKeuangan');
Route::get('/Filterkeuangan','KeuanganController@Filter')->name('FilterLaporanKeuangan');
