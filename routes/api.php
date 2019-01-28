<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Customer List
Route::post('customer/showTable', 'CustomerController@showTable')->name('customer.showTable');

//Order List By Customer
Route::post('orderCustomer/showTable/{id}', 'OrderController@orderCustomerShowTable')->name('orderCustomer.showTable');