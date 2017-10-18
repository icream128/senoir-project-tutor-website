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




// First Page
Route::get('/', function () {
    return redirect('firstpage');
});
Route::get('/firstpage', function () {
    return view('firstpage');
});

Route::get('/notstudent', function () {
    return view('notstudent');
});

/////////////////////////////////////////////////////////////////////////////////////

// Tutor
Route::get('/tutorhome','TutorHomeController@index');

// Route::get('/tutorcreatecourse','CreateCourseController@indexTutor');
// Route::post('/tutorsavecourse','CreateCourseController@insertTutor');

Route::get('/tutorprofile', 'ProfileController@indexTutor');

Route::get('/tutorstatuscreate','StatusCreateController@indexTutor');

Route::get('/tutorstatusrequest','StatusRequestController@indexTutor');

Route::get('/tutorfav','FavouriteController@indexTutor');

Route::get('/tutorhistory','HistoryController@indexTutor');

Route::get('/tutormycourse','MycourseController@indexTutor');

Route::get('/tutordeal', function () {
    return view('tutor.TutorDeal');
});





////////////////////////////////////////////////////////////////////////////////////////////





// learner


Route::get('/learnercreatecourse','CreateCourseController@indexLearner');
Route::post('/learnersavecourse','CreateCourseController@insertLearner');

//filter
Route::get('/testsearch', function () {
    return view('searching');
});

// Route::get('/learnerhome','LearnerHomeController@index');
// Route::get('/learnerhome_datatable','LearnerHomeController@showSchedule');

Route::get('/learnerprofile', 'ProfileController@indexLearner');

Route::get('/learnerhistory','HistoryController@indexLearner');

Route::get('/learnermycourse','MycourseController@indexLearner');

Route::get('/learnerstatusrequest','StatusRequestController@indexLearner');

Route::get('/learnercoursestatus','CourseStatusController@indexLearner');

Route::get('/learnerfavorite', function () {
    return view('learner.LearnerFavourite');
});

Route::get('/adddetail', function () {
    return view('learner.LearnerAddDetail');
});

Route::post('/learnersavedetail','AddDetailController@saveDetailLearner');

Route::get('/learnerdeal','DealCourseController@indexLearner');

// learner JSON
Route::get('/searching', 'SearchController@liveshow');

Route::get('/showdetail', 'SearchController@showdetail');





//visitor
Auth::routes();

Route::post('/modal-login',function(\Illuminate\Http\Request $req){
    $username = $req->input('username');
    $password = $req->input('password');

    if(Auth::attempt(['username'=>$username,'password'=>$password], $req->remember)){
        return redirect('/tutorhome');
    }else{
        return redirect('/login');
    }
});
Route::post('/loginsuccess','LoginController@login');
Route::get('/login', function () {
    return view('auth.password.login');
})->name('login');
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/register', function () {
    return view('register');
});
Route::post('/registersave','RegisterController@save');
