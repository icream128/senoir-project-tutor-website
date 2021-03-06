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

/////////////////////////////////////////////////////////////////////////////////////

// Tutor
Route::get('/tutorhome','TutorHomeController@index');

// Route::get('/tutorcreatecourse','CreateCourseController@indexTutor');
// Route::post('/tutorsavecourse','CreateCourseController@insertTutor');
Route::get('/tutorprofile', 'ProfileController@indexTutor')->middleware('tutor');

Route::get('/tutorshortprofile&{tutor_id}', 'ProfileShortController@indexLearner');

Route::get('/tutoreditprofile&{user_id}', 'TutorEditProfileController@edit')->middleware('tutor');
Route::post('/updatedy&{user_id}', 'TutorEditProfileController@updated')->middleware('tutor');

Route::get('/tutorstatuscreate','StatusCreateController@indexTutor')->middleware('tutor');

Route::get('/tutorstatusrequest','StatusRequestController@indexTutor')->middleware('tutor');

Route::get('/tutorfav','FavouriteController@indexTutor')->middleware('tutor');

Route::get('/tutorhistory','HistoryController@indexTutor')->middleware('tutor');

Route::get('/tutormycourse','MyCourseController@indexTutor')->middleware('tutor');

Route::get('/tutordeal', function () {
    return view('tutor.TutorDeal');
});

Route::post('/tutor-send-request','TutorHomeController@tutor_send_request');

// tutor JSON
Route::get('/searching', 'SearchController@liveshow');

Route::get('/showdetail', 'SearchController@showdetail');

Route::post('/checking-tutor-request','LearnerHomeController@checking_tutor_request');




////////////////////////////////////////////////////////////////////////////////////////////





// learner


Route::get('/learnercreatecourse','CreateCourseController@indexLearner')->middleware('learner');
Route::post('/learnersavecourse','CreateCourseController@insertLearner')->middleware('learner');

Route::get('/learnereditcourse&{learner_schedule_id}','LearnerEditCourseController@edit')->middleware('learner');
Route::post('/updateeditcourse&{learner_schedule_id}','LearnerEditCourseController@updated')->middleware('learner');
Route::get('/deletecourse&{learner_schedule_id}','LearnerEditCourseController@delete')->middleware('learner');

//filter
Route::get('/testsearch', function () {
    return view('searching');
});

// Route::get('/learnerhome','LearnerHomeController@index');
// Route::get('/learnerhome_datatable','LearnerHomeController@showSchedule');

Route::get('/learnerprofile', 'ProfileController@indexLearner')->middleware('learner');
Route::get('/learnershortprofile&{user_id_request}', 'ProfileShortController@indexTutor');

Route::get('/learnereditprofile&{user_id}', 'LearnerEditProfileController@edit')->middleware('learner');
Route::post('/updated&{user_id}', 'LearnerEditProfileController@updated')->middleware('learner');

Route::get('/learnerhistory','HistoryController@indexLearner')->middleware('learner');

Route::get('/learnermycourse','MyCourseController@indexLearner')->middleware('learner');
Route::post('/learner-course-success','MyCourseController@send_course_success')->middleware('learner');
Route::post('/learner-course-canceled','MyCourseController@send_course_canceled')->middleware('learner');

Route::get('/learnerstatusrequest','StatusRequestController@indexLearner')->middleware('learner');

Route::get('/learnercoursestatus','CourseStatusController@indexLearner')->middleware('learner');

Route::get('/learnerfavorite', function () {
    return view('learner.LearnerFavourite');
});

Route::get('/adddetail', function () {
    return view('learner.LearnerAddDetail');
});

Route::post('/learnersavedetail','AddDetailController@saveDetailLearner')->middleware('learner');

Route::get('/learnerdeal&{learner_schedule_request_id}','DealCourseController@indexLearner')->middleware('learner');

Route::post('/createagreement','DealCourseController@createAgreement')->middleware('learner');

Route::get('/learnercomment', 'CommentController@indexLearner')->middleware('learner');



//admin
Route::get('/viewuser','ViewUserController@index');
Route::get('/updatestop&{user_id}','ViewUserController@updatestop');
Route::get('/updatepass&{user_id}','ViewUserController@updatepass');

Route::get('/viewcourse','ViewCourseController@index');






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

// Route::get('/home', 'HomeController@index')->name('home');

Route::get('/register', function () {
    return view('register');
});
Route::post('/registersave','RegisterController@save');






///cream

Route::post('/dealnextcourse','DealNextCourseController@NextDeal');
Route::post('/save','DealNextCourseController@save');
Route::get('/editdealnextcourse&{frequency_id}','EditNextDealController@editNextDeal');
Route::post('/saveeditnextcourse&{frequency_id}','EditNextDealController@save');
Route::get('/classbegin&{agreement_id}&{learner_schedule_time_id}','StudyClassController@ClassBegin');
Route::get('/receipt&{agreement_id}','ReceiptController@Receipt');
Route::get('/endcourse&{agreement_id}','EndCourseController@indexLearner');
Route::get('/endcoursesave&{agreement_id}','EndCourseController@SaveStatusLearner');
Route::get('/cancelcourse&{agreement_id}','CancelCourseController@indexLearner');
Route::get('/cancelcoursesave&{agreement_id}','CancelCourseController@SaveStatusLearner');