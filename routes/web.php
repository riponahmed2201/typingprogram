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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware('auth')->group(function () {
    
    //DOCUMENT ROUTES
    Route::group(['prefix' => 'document'], function () {
        Route::get('/index',['as' => 'document.index', 'uses'=>'Document\DocumentController@index']);
        Route::get('/create',['as' => 'document.create', 'uses'=>'Document\DocumentController@create']);
        Route::post('/store',['as' => 'document.store', 'uses'=>'Document\DocumentController@store']);
        Route::get('/edit/{id}',['as'=>'document.edit','uses'=>'Document\DocumentController@edit']);
        Route::post('/update/{id}',['as' => 'document.update', 'uses'=>'Document\DocumentController@update']);
        Route::get('/delete/{id}',['as'=>'document.delete','uses'=>'Document\DocumentController@destroy']);
    });
});

