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

Route::get('/welcome', function () {
    return view('welcome');
})->middleware('role:Auth');
Route::get('/article','ArticleController@index');
Route::get('/article/category/{categoryId}','ArticleController@index');
Route::get('/article/show/{id}','ArticleController@show');
Route::get('/article/user/','ArticleController@showByUser')->middleware('role:User');
Route::get('/article/user/{id}','ArticleController@showByUser')->middleware('role:Admin');
Route::get('/article/destroy/{id}','ArticleController@destroy')->middleware('role:Auth');
Route::get('/signup','AuthController@viewSignUp')->middleware('role:Guest');
Route::get('/login','AuthController@viewLogin')->middleware('role:Guest');
Route::post('/signup','AuthController@postSignUp')->name('register')->middleware('role:Guest');
Route::post('/login','AuthController@postLogin')->name('login')->middleware('role:Guest');
Route::get('/signout', 'AuthController@signout')->middleware('role:Auth');
Route::get('/article/add', 'ArticleController@create')->middleware('role:User');
Route::post('/article/add', 'ArticleController@store')->name('addblog')->middleware('role:User');
Route::get('/profile', 'UserController@viewProfile')->middleware('role:User');
Route::put('/profile', 'UserController@putProfile')->name('updateprofile')->middleware('role:User');
Route::get('/article/myblog', 'ArticleController@showByUser')->middleware('role:User');
Route::get('/user', 'UserController@manageUser')->middleware('role:Admin');
Route::get('/user/destroy/{id}', 'UserController@deleteUser')->middleware('role:Admin');

