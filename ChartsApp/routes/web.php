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
Route::group(['middleware' => ['guest']], function(){
    Route::get('/', function () {
        return view('modules.auth.login');
    });
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/home', 'HomeController@search')->name('search');

Route::get('/home/{id}', 'HomeController@index6')->name('home6');
Route::post('/home/{id}', 'HomeController@search6')->name('search6');

Route::get('/home2', 'HomeController@index2')->name('home2');
Route::post('/home2', 'HomeController@search2')->name('search2');

Route::get('/home2/{id}', 'HomeController@index4')->name('home4');
Route::post('/home2/{id}', 'HomeController@search4')->name('search4');

Route::get('/home3', 'HomeController@index3')->name('home3');
Route::post('/home3', 'HomeController@search3')->name('search3');

Route::get('/home3/{id}', 'HomeController@index5')->name('home5');
Route::post('/home3/{id}', 'HomeController@search5')->name('search5');


Route::get('/bar', 'HomeController@bar')->name('bar');
Route::get('/bar-chart/{start_date}/{end_date}', 'HomeController@chart')->name('chart.bar');
Route::get('/bar-chart2/{start_date}/{end_date}', 'HomeController@chart2')->name('chart2.bar');

Route::get('/doughnut', 'HomeController@doughnut')->name('doughnut');
Route::get('/pie', 'HomeController@pie')->name('pie');
