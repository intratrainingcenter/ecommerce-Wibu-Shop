<?php
Route::get('/dashboard','HomeController@index')->name('dashboard');
Route::get('/Profile/{kode_user}','HomeController@Profile')->name('Profile');
Route::post('paypal', 'PaymentController@payWithpaypal');
// route for check status of the payment
Route::get('status', 'PaymentController@getPaymentStatus');

// forntend
Route::get('/','FrontendControler@Index')->name('frontend.home');
Route::get('/shop-product-list/{kode_kategori}','FrontendControler@product_list')->name('frontend.product_list');
Route::get('/shop-checkout','FrontendControler@Checkout')->name('frontend.Checkout');
Route::get('/shop-item/{kode_porduk}','FrontendControler@Shop_item')->name('frontend.shop_item');
Route::get('/all-products','FrontendControler@AllProducts')->name('all_products');
Route::post('reviewProduct','reviewProducts@store')->name('frontend.reviewProduct');
Route::match(['get', 'post'], '/shopping-cart','FrontEndKeranjangController@cart')->name('frontend.cart')->middleware('auth:pembeli');
Route::get('show-cart', 'FrontEndKeranjangController@ShowCart')->name('show.cart')->middleware('auth:pembeli');
Route::get('load-cart', 'FrontEndKeranjangController@LoadCart')->name('load.cart')->middleware('auth:pembeli');
Route::post('update-item/{kode_keranjang}/{kode_produk}','FrontEndKeranjangController@updateItem')->name('update.item')->middleware('auth:pembeli');
Route::post('add-to-cart/{id}','FrontEndKeranjangController@AddToCart')->name('frontend.addtocart')->middleware('auth:pembeli');
Route::get('/shopping-cart/delete-produk/{id}', 'FrontEndKeranjangController@DeleteCartProduk')->name('frontend.deletecart');
Auth::routes();
//sub menu
Route::get('/home', 'HomeController@index')->name('home');
Route::resource('produk', 'ProdukController')->Middleware('admin_spv');
Route::resource('promo', 'PromoController')->Middleware('admin_spv');
Route::resource('kategori','KategoriController')->Middleware('admin_spv');
Route::resource('user','UserController')->Middleware('spv');
Route::put('user/aktif/{kode_user}','UserController@Aktif')->name('Aktif')->Middleware('spv');
Route::put('user/nonaktif/{kode_user}','UserController@nonAktif')->name('nonAktif')->Middleware('spv');
//laporan
Route::get('LaporanTransaksi','LaporanTransaksi@Index')->name('LaporanTransaksi')->Middleware('spv_owner');
Route::get('FilterTransaksi','LaporanTransaksi@Filter')->name('FilterLaporanTransaksi')->Middleware('spv_owner');;
Route::get('aporankeuangan','KeuanganController@Index')->name('LaporanKeuangan')->Middleware('spv_owner');;
Route::get('Filterkeuangan','KeuanganController@Filter')->name('FilterLaporanKeuangan')->Middleware('spv_owner');;
Route::get('aporanProduct','laporanBarang@Index')->name('LaporanProduct')->Middleware('spv_owner');;
Route::get('FilterProduct','laporanBarang@Filter')->name('FilterLaporanProduct')->Middleware('spv_owner');;
//customer
Route::prefix('pembeli')->group(function() {
    Route::group(['middleware' => 'guest'], function () {
        Route::get('register', 'PembeliAuthController@showRegisterForm')->name('pembeli.register');
        Route::get('login','PembeliAuthController@showLoginForm')->name('pembeli.login');
        Route::post('register','PembeliAuthController@Register')->name('pembeli.register.submit');
        Route::post('login','PembeliAuthController@Login')->name('pembeli.login.submit');
    });
    Route::group(['middleware' => 'auth:pembeli'], function () {
        Route::get('logout', 'PembeliAuthController@Logout')->name('pembeli.logout');
        Route::get('my_account', 'PembeliAuthController@index')->name('pembeli.account');
        Route::get('edit', 'PembeliAuthController@Edit')->name('account.edit');
        Route::get('editpassword', 'PembeliAuthController@EditPassword')->name('account.password');
        Route::patch('updateprofile/{id}', 'PembeliAuthController@UpdateProfile')->name('update.profile');
        Route::patch('updatepassword/{id}', 'PembeliAuthController@UpdatePassword')->name('change.password');
        Route::get('address', 'PembeliAuthController@address')->name('account.address');
        Route::get('province', 'PembeliAuthController@GetProvince')->name('address.province');
        Route::get('city/{id}', 'PembeliAuthController@GetCity')->name('address.city');
        Route::post('address', 'PembeliAuthController@AddAddress')->name('add.address');
        Route::get('edit_address/{id}', 'PembeliAuthController@EditAddress')->name('edit.address');
        Route::patch('update_address/{id}', 'PembeliAuthController@UpdateAddress')->name('update.address');
        Route::delete('delete_address/{id}', 'PembeliAuthController@DeleteAddress')->name('delete.address');
        Route::get('order-history', 'PembeliAuthController@OrderHistory')->name('order.history');
    });
});
