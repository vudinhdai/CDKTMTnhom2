<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/', 'HomeController@home' );
Route::get('/trang-chu', 'HomeController@home' );
Route::get('/detail/{id}', 'DetailController@getDetail' );
Route::post('/detail/{id}', 'DetailController@postComment' );
Route::post('/cart', 'CartController@postCart' )->middleware('Buyer');
Route::get('/cart', 'CartController@getCart' )->middleware('Buyer');
Route::get('/search','searchController@getSearch');
Route::get('/cate/{id}','CateController@getCate');
Route::get('/delete_cart/{id}','CartController@deleteCart');
Route::get('/cart/update','CartController@updateCart')->middleware('Buyer');
Route::post('/by','CartController@by')->middleware('Buyer');

Route::get('info','InfoController@getinfo')->middleware('Buyer');
Route::get('his-detail/{id}','InfoController@gethis')->middleware('Buyer');
Route::get('/shop/{id}','ShopController@getshop');


// back end

Route::get('/login/{id}','LoginController@getlogin');
Route::post('/login/{id}','LoginController@postlogin');
Route::get('/logout','LoginController@getlogout');
Route::get('/sign_up','LoginController@getsign');
Route::post('/sign_up','LoginController@postsign');
Route::get('/sign_up/{id}','LoginController@getsign2');
Route::post('/sign_up/{id}','LoginController@postsign2');
Route::get('/home','SellerController@getseller')->middleware('Seller');
Route::get('/logout-seller','SellerController@logout')->middleware('Seller');
Route::get('/product','ProductController@getprod')->middleware('Seller');
Route::get('/add-prod','ProductController@addprod')->middleware('Seller');
Route::post('/add-prod','ProductController@postprod')->middleware('Seller');
Route::get('/dele-prod/{id}','ProductController@deleprod')->middleware('Seller');
Route::get('/edit-prod/{id}','ProductController@editprod')->middleware('Seller');
Route::post('/edit-prod/{id}','ProductController@posteditprod')->middleware('Seller');

Route::get('/order-detail/{id}','SellerController@getorderdetail')->middleware('Seller');;


//admin
Route::get('/admin','AdminController@getAdmin')->middleware('admin');
Route::get('/login_admin','AdminController@login_admin');
Route::post('/login_admin','AdminController@post_login_admin');
Route::get('/logout_admin','AdminController@logout_admin');
Route::get('/order_load','AdminController@order_load');
Route::get('/load_status','AdminController@load_status');
Route::get('/print/{id}','AdminController@edit_status');
Route::post('/print/{id}','AdminController@post_edit_status');
Route::get('/admin/user','AdminUserController@get_user');
Route::get('/admin/cate','CateAdminController@get_admin_cate');