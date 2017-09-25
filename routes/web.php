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
    return redirect('firstpage');
});
Route::get('/firstpage', function () {
    return view('firstpage');
});
Route::get('/tutorhome','TutorHomeController@index');

Route::get('/tutorcreatecourse','CreateCourseController@indexTutor');
Route::post('/tutorsavecourse','CreateCourseController@insertTutor');

Route::get('/tutorprofile', function () {
    return view('tutor.profile');
});
Route::get('/tutorstatuscreate','StatusCreateController@indexTutor');
Route::get('/tutorstatusrequest','StatusRequestController@indexTutor');
Route::get('/tutorfav','FavouriteController@indexTutor');
Route::get('/tutorhistory','HistoryController@indexTutor');
Route::get('/tutormycourse','MycourseController@indexTutor');
Route::get('/tutordeal', function () {
    return view('tutor.TutorDeal');
});
///

// learner


Route::get('/learnercreatecourse','CreateCourseController@indexLearner');
Route::post('/learnersavecourse','CreateCourseControllerr@insertLearner');

//filter
Route::get('/testsearch', function () {
    return view('searching');
});
Route::get('/searching', 'SearchController@liveshow');
Route::get('/showdetail', 'SearchController@showdetail');

Route::get('/learnerhome','LearnerHomeController@index');
Route::get('/learnerhome_datatable','LearnerHomeController@showSchedule');

Route::get('/learnerprofile', 'ProfileController@indexLearner');
Route::get('/learnerhistory','HistoryController@indexLearner');
Route::get('/learnermycourse','MycourseController@indexLearner');
Route::get('/learnerstatusrequest','StatusRequestController@indexLearner');
Route::get('/learnerfavorite', function () {
    return view('learner.LearnerFavourite');
});
Route::get('/adddetail', function () {
    return view('learner.LearnerAddDetail');
});
Route::post('/learnersavedetail','AddDetailController@saveDetailLearner');
Route::get('/learnerdeal', function () {
    return view('learner.LearnerDeal');
});

//visitor
Auth::routes();

Route::post('/loginsuccess','LoginController@login');
Route::get('/login', function () {
    return view('auth.password.login');
});
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/register', function () {
    return view('register');
});
Route::post('/registersave','RegisterController@save');
// Route::get('/', function () {
//     return redirect('firstpage');
// });



