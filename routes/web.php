<?php
Route::get('/dashboard','HomeController@index')->name('dashboard');
Route::get('/Profile/{kode_user}','HomeController@Profile')->name('Profile');
Route::post('paypal', 'PaymentController@payWithpaypal');
// route for check status of the payment
Route::get('status', 'PaymentController@getPaymentStatus');

// forntend
Route::get('/','FrontendControler@Index')->name('frontend.home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('user','UserController');
Route::resource('produk', 'ProdukController');
Route::resource('promo', 'PromoController');
Route::put('user/aktif/{kode_user}','UserController@Aktif')->name('Aktif');
Route::put('user/nonaktif/{kode_user}','UserController@nonAktif')->name('nonAktif');
Route::prefix('pembeli')->group(function() {
    Route::group(['middleware' => ['guest']], function () {
        Route::get('register', 'PembeliAuthController@showRegisterForm')->name('pembeli.register');
        Route::get('login','PembeliAuthController@showLoginForm')->name('pembeli.login');
    });
    Route::post('register','PembeliAuthController@Register')->name('pembeli.register.submit');
    Route::post('login','PembeliAuthController@Login')->name('pembeli.login.submit');
    Route::get('logout', 'PembeliAuthController@Logout')->name('pembeli.logout');
});
