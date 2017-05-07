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

use App\Http\Middleware\RedirectIfAuthenticated;

Route::group([
    'middleware' => [
        'auth',
        \App\Http\Middleware\AdminVerify::class
    ]], function () {
    Route::post('/search',
        ['as' => 'items', 'uses' => 'ItemsController@search']);
    Route::get('/search',
        ['as' => 'items', 'uses' => 'ItemsController@search']);

    Route::get('/',
        ['as' => 'items', 'uses' => 'ItemsController@search']);

    Route::post('/',
        ['as' => 'items', 'uses' => 'ItemsController@store']);

    Route::post('/edit',
        ['as' => 'items', 'uses' => 'ItemsController@edit']);

    Route::delete('/delete',
        ['as' => 'items', 'uses' => 'ItemsController@delete']);
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('/visitor', 'HomeController@visitor');