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
// tutor
Route::get('/', function () {
    return view('welcome');
});
Route::get('/index', function () {
    return view('index');
});
Route::get('/home', function () {
    return view('home');
});
Route::get('/register', function () {
    return view('register');
});
Route::get('/profile', function () {
    return view('proflie');
});
Route::get('/history', function () {
    return view('history');
});
Route::get('/mycourse', function () {
    return view('mycourse');
});
Route::get('/showdetail', function () {
    return view('showdetail');
});
Route::get('/createcourse', function () {
    return view('createcourse');
});
Route::get('/favorite', function () {
    return view('favorite');
});
// learner
Route::get('/', function () {
    return view('welcome');
});
Route::get('/home', function () {
    return view('home');
});
Route::get('/register', function () {
    return view('register');
});
Route::get('/profile', function () {
    return view('proflie');
});
Route::get('/history', function () {
    return view('history');
});
Route::get('/mycourse', function () {
    return view('mycourse');
});
Route::get('/showdetail', function () {
    return view('showdetail');
});
Route::get('/createcourse', function () {
    return view('createcourse');
});
Route::get('/favorite', function () {
    return view('favorite');
});


