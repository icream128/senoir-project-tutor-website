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
Route::get('/tutorhome', function () {
    return view('tutor.home');
});
Route::get('/tutorregister', function () {
    return view('tutor.register');
});
Route::get('/tutorprofile', function () {
    return view('tutor.profile');
});
Route::get('/tutorhistory', function () {
    return view('tutor.history');
});
Route::get('/tutormycourse', function () {
    return view('tutormycourse');
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
// learner
Route::get('/', function () {
    return view('welcome');
});
Route::get('/learnerhome','LearnerHomeController@index');
Route::get('/learnercreatecourse','CreateCourseLearner@index');
Route::get('/learnerhome_datatable','LearnerHomeController@showSchedule');
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
Route::get('/learnerfavorite', function () {
    return view('learner.favorite');
});


