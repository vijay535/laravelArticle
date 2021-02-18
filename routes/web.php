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

/*Route::get('/', function () {
    return view('frontEndHome');
});*/
Route::get('/', 'ArticleController@frontendshow');
Route::get('/articleDetails/{id}', 'ArticleController@articleDetail')->name('articleDetails');

Auth::routes();

Route::group(['middleware'=>'auth'], function(){
	Route::get('/home', 'HomeController@index')->name('home');
	Route::get('/article', 'ArticleController@index')->name('article');
	Route::get('/articleAdd', 'ArticleController@create')->name('articleAdd');
	Route::post('/articleStore', 'ArticleController@store')->name('articleStore');
	Route::get('/articleEdit/{id}', 'ArticleController@edit')->name('articleEdit');
	Route::get('/articleDelete/{id}', 'ArticleController@destroy')->name('articleDelete');
	Route::post('/articleUpdate/{id}','ArticleController@update')
		->name('Article.articleUpdate');
});
