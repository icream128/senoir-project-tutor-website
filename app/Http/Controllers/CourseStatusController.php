<?php

namespace App\Http\Controllers;

use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use DB;
use Illuminate\Http\Request;

class CourseStatusController extends BaseController
{
   
    public function __construct(){
        
    }

    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */

    public function indexLearner() {
        //header
        $learnerProfile = DB::table('user')
        ->select(['img_profile'])
        ->where('user_id', Auth::user()->user_id)->first();
        
        //Get data from database
        $learnerSchedule = DB::table('learner_schedule')
        ->select(['img_profile', 'subject_name', 'level_name', 'duration_name', 'day_name', 'status_name', 'user.tel'])
        ->leftJoin('user','learner_schedule.user_id','=','user.user_id')
        ->leftJoin('subject','learner_schedule.subject_id','=','subject.subject_id')
        ->leftJoin('level','learner_schedule.level_id','=','level.level_id')
        ->leftJoin('status','learner_schedule.status_id','=','status.status_id')
        ->leftJoin('learner_schedule_time','learner_schedule.learner_schedule_id','=','learner_schedule_time.learner_schedule_id')
        ->leftJoin('day','learner_schedule_time.day_id','=','day.day_id')
        ->leftJoin('duration','learner_schedule_time.duration_id','=','duration.duration_id')
        ->where('learner_schedule.user_id', Auth::user()->user_id)
        ->whereIn('learner_schedule.status_id', [1,2])
        ->paginate(10);

        //Set data to view
        $data = compact('learnerProfile' ,'learnerSchedule');
             
        return view('learner.LearnerCoursestatus',$data);
    }

    // public function indexTutor() {

    //     //header
    //     $tutorProfile = DB::table('user')
    //     ->select(['img_profile'])
    //     ->where('user_id', Auth::user()->user_id)->first();
        
    //     //Get data from database
    //     $learnerSchedule = DB::table('learner_schedule')
    //     ->select(['img_profile', 'firstname', 'lastname', 'subject_name', 'level_name', 'duration_name', 'day_name', 'status_name', 'user.tel'])
    //     ->leftJoin('user','learner_schedule.user_id','=','user.user_id')
    //     ->leftJoin('subject','learner_schedule.subject_id','=','subject.subject_id')
        
    //     ->leftJoin('level','learner_schedule.level_id','=','level.level_id')
    //     ->leftJoin('status','learner_schedule.status_id','=','status.status_id')
    //     ->leftJoin('learner_schedule_time','learner_schedule.learner_schedule_id','=','learner_schedule_time.learner_schedule_id')
    //     ->leftJoin('day','learner_schedule_time.day_id','=','day.day_id')
    //     ->leftJoin('duration','learner_schedule_time.duration_id','=','duration.duration_id')
    //     // ->where('user_id_request', Auth::user()->user_id)
    //     ->whereIn('learner_schedule.status_id', [8])
    //     ->paginate(10);

    //     //Set data to view
    //     $data = compact('tutorProfile' ,'learnerSchedule');
             
    //     return view('tutor.TutorFavorite',$data);
    // }
}
