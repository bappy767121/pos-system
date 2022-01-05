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

	Route::get('login','Auth\LoginController@login')->name('login');
	Route::post('login','Auth\LoginController@confirm')->name('login.confirm');
	
	Route::group(['middleware' => 'auth'],function(){
	Route::get('dashbord', function(){
	return view('welcome');
	});
	
	Route::get('logout','Auth\LoginController@logout')->name('logout');

	Route::get('groups','UserGroupController@index');
	Route::get('groups/create','UserGroupController@create');
	Route::post('groups','UserGroupController@store');
	Route::delete('groups/{id}','UserGroupController@destroy');

	Route::resource('users', 'UserController');

	Route::get('users/{id}/sales','UserSaleController@index')->name('user.sales');
	Route::post('users/{id}/invoices', 'UserSaleController@createInvoice')->name('user.sales.store');
	Route::get('users/{id}/invoices/{invoice_id}','UserSaleController@invoice')->name('user.sales.invoice_details');
	Route::delete('users/{id}/invoices/{invoice_id}','UserSaleController@destroy')->name('user.sales.destroy');
	Route::post('users/{id}/invoices/{invoice_id}','UserSaleController@addItem')->name('user.sales.invoices.add_item');
	Route::delete('users/{id}/invoices/{invoice_id}/{item_id}','UserSaleController@destroyItem')->name('user.sales.invoices.delete_item');



	Route::get('users/{id}/purchase','UserPurchaseController@index')->name('user.purchases');
	Route::post('users/{id}/purchase', 'UserPurchaseController@createInvoice')->name('user.purchases.store');
	Route::get('users/{id}/purchase/{invoice_id}','UserPurchaseController@invoice')->name('user.purchases.invoice_details');
	Route::delete('users/{id}/purchase/{invoice_id}','UserPurchaseController@destroy')->name('user.purchases.destroy');
	Route::post('users/{id}/purchase/{invoice_id}','UserPurchaseController@addItem')->name('user.purchases.invoices.add_item');
	Route::delete('users/{id}/purchase/{invoice_id}/{item_id}','UserPurchaseController@destroyItem')->name('user.purchases.invoices.delete_item');


	Route::get('users/{id}/payments','UserPaymentController@index')->name('user.payments');
	Route::post('users/{id}/payments/{invoice_id?}','UserPaymentController@store')->name('user.payment.store');
	Route::delete('users/{id}/payments/{payment_id}','UserPaymentController@destroy')->name('user.payment.destroy');


	Route::get('users/{id}/recives','UserReciveController@index')->name('user.recives');
	Route::post('users/{id}/recives/{invoice_id?}','UserReciveController@store')->name('user.recive.store');
	Route::delete('users/{id}/recives/{recive_id}','UserReciveController@destroy')->name('user.recive.destroy');

	Route::resource('categories', 'CategoryController',['except'=>'show']);
	Route::resource('products', 'ProductController');

	Route::get('stock', 'ProductSlockController@index')->name('stocks');
});


