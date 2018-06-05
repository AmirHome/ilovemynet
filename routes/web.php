<?php

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

Route::get('/', function () {
    return view('welcome');
});


Route::resource('persons','PersonsController');

/*
|--------------------------------------------------------------------------
| Override Route Resource Addresses
|--------------------------------------------------------------------------
|
| Route::resource('addresses','AddressesController');
|
*/
Route::get('addresses/{personId}', ['as' => 'addresses.index', 'uses' => 'AddressesController@index']);
Route::get('addresses/create/{personId}', ['as' => 'addresses.create', 'uses' => 'AddressesController@create']);

Route::resource('addresses', 'AddressesController', ['names' => [
    'index' => 'addresses/{personId}',
    'create' => 'addresses/create/{personId}'
]]);