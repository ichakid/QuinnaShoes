<?php
use App\Http\Requests\Request;

Route::get('/home', 'HomeController@index');

Route::get('/login', 'HomeController@login');

Route::get('/logout', 'HomeController@logout');

Route::get('/account', 'HomeController@account');

Route::patch('/updateduser', 'HomeController@updatedUser');

Route::get('/clean', 'HomeController@clean');

Route::patch('/signup', 'HomeController@addUser');

Route::patch('/login', 'HomeController@checkUser');

Route::get('/loginrequired', 'HomeController@loginRequired');

Route::get('/detail/{id}', 'HomeController@detail');

Route::get('/detailredirect', 'HomeController@detailRedirect');



Route::get('/listpenjualan', 'PenjualanController@showListPenjualan');


Route::get('/listproduct', 'ProductController@showListProduct');

Route::get('/addproduct', 'ProductController@addProduct');

Route::patch('/addproduct', 'ProductController@uploadProduct');

Route::get('/deleteproduct/{id}', 'ProductController@deleteProduct');

Route::patch('/uploadgambar', 'ProductController@upload');

Route::get('/editproduct/{id}', 'ProductController@editProduct');

Route::get('/editproductredirect', 'ProductController@editProductRedirect');

Route::patch('/editproductredirect', 'ProductController@checkEditProductRedirect');

Route::get('/detailpemesanan', 'PesananController@detailPemesananCartRedirect');

Route::get('/detailpemesanancart/{id}', 'PesananController@detailPemesanan');

Route::get('/finishpesanan/{id}', 'PesananController@finishPesanan');

Route::get('/finish', 'PesananController@finish');

Route::patch('/finishconfirmed', 'PesananController@finishConfirmed');

Route::get('/acceptpesanan/{id}', 'PesananController@acceptPesanan');

Route::get('/deletepesanan/{id}', 'PesananController@deletePesanan');

Route::get('/pesanan', 'PesananController@showListPesanan');

Route::get('/listorderbydesign', 'PesananController@showListOrderByDesign');

Route::get('/detailpesanan/{id}', 'PesananController@detailPesanan');

Route::get('/detailcart/{id}', 'PesananController@detailCart');

Route::get('/detailcartredirect', 'PesananController@detailCartRedirect');

Route::get('/detailpesananredirect', 'PesananController@detailPesananRedirect');

Route::patch('/pesan', 'PesananController@checkPesanan');

Route::get('/orderbydesign', 'PesananController@orderByDesign');

Route::patch('/uploadgambarpesanan', 'PesananController@upload');

Route::get('/listpesanan', 'PesananController@showListPesanan');


Route::get('/cart', 'CartController@showCart');

Route::get('/checkout', 'CartController@checkout');

Route::patch('/confirmedcheckout', 'CartController@confirmedCheckout');

Route::patch('/checkoutdata', 'CartController@checkoutData');

Route::get('/confirm/{id}', 'CartController@redirectConfirm');

Route::get('/confirm', 'CartController@confirmation');

Route::patch('/addcart', 'CartController@cartConfirmed');

Route::get('/delete/{id}', 'CartController@delete');

Route::get('/addsuccess', 'CartController@addSuccess');

Route::get('/addfailed', 'CartController@addFailed');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
