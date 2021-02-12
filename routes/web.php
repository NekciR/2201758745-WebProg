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
    return redirect('/article');
});

Route::get('/article','ArticleController@index');
Route::get('/article/category/{categoryId}','ArticleController@index');
Route::get('/article/show/{id}','ArticleController@show');
Route::get('/article/user/','ArticleController@showByUser');
Route::get('/article/user/{id}','ArticleController@showByUser');
Route::get('/article/destroy/{id}','ArticleController@destroy');
Route::get('/signup','AuthController@viewSignUp');
Route::get('/login','AuthController@viewLogin');
Route::post('/signup','AuthController@postSignUp')->name('register');
Route::post('/login','AuthController@postLogin')->name('login');
Route::get('/signout', 'AuthController@signout');
Route::get('/article/add', 'ArticleController@create');
Route::post('/article/add', 'ArticleController@store')->name('addblog');
Route::get('/profile', 'AuthController@viewProfile');
Route::put('/profile', 'AuthController@putProfile')->name('updateprofile');
Route::get('/article/myblog', 'ArticleController@showByUser');
Route::get('/user', 'AuthController@manageUser');
Route::get('/user/destroy/{id}', 'AuthController@deleteUser');

