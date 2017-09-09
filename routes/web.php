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
    return view('index');
});

// tutor
Route::get('/tutorlogin', function () {
    return view('tutor.login');
});
Route::post('/loginsuccess','loginController@login');

Route::get('/tutorhome', function () {
    return view('tutor.home');
});
Route::get('/tutorregister', function () {
    return view('tutor.register');
});
Route::get('/tutorprofile', function () {
    return view('tutor.proflie');
});
Route::get('/tutorhistory', function () {
    return view('tutor.history');
});
Route::get('/tutormycourse', function () {
    return view('tutor.mycourse');
});
Route::get('/tutorshowdetail', function () {
    return view('tutor.showdetail');
});
Route::get('/tutorcreatecourse', function () {
    return view('tutor.createcourse');
});
Route::get('/tutorfavorite', function () {
    return view('tutor.favorite');
});
Route::get('/tutorteaching', function () {
    return view('tutor.teaching');
});
// learner
Route::get('/learner', function () {
    return view('learner.welcome');
});
Route::get('/learnerhome', function () {
    return view('learner.home');
});
Route::get('/learnerregister', function () {
    return view('learner.register');
});
Route::get('/learnerprofile', function () {
    return view('learner.proflie');
});
Route::get('/learnerhistory', function () {
    return view('learner.history');
});
Route::get('/learnermycourse', function () {
    return view('learner.mycourse');
});
Route::get('/learnershowdetail', function () {
    return view('learner.showdetail');
});
Route::get('/learnercreatecourse', function () {
    return view('learner.createcourse');
});
Route::get('/learnerfavorite', function () {
    return view('learner.favorite');
});


