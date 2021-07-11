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

Route::group(
    ['middleware' => ['web', 'auth', 'permission'],
        'prefix' => 'admin',
    ], function() {
    Route::get('/', 'AdminController@index')->name('admin.dashboard');
    Route::get('config-single-sms', 'AdminController@singleSMSAction')->name('admin.config-single-sms');
    Route::post('store-single-sms', 'AdminController@singleSMSStoreAction')->name('admin.store-single-sms');
});