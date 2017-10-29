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
        $this->middleware('auth');
        $this->middleware('learner');
    }

    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */

    public function indexLearner() {
        //header
        $learnerProfile = DB::table('user')
        ->select(['img_profile', 'username'])
        ->where('user_id', Auth::user()->user_id)->first();
        
        //Get data from database
        $learnerSchedule = DB::table('learner_schedule')
        ->select(['learner_schedule_id','img_profile', 'subject_name', 'level_name', 'status_name', 'user.tel'])
        ->leftJoin('user','learner_schedule.user_id','=','user.user_id')
        ->leftJoin('subject','learner_schedule.subject_id','=','subject.subject_id')
        ->leftJoin('level','learner_schedule.level_id','=','level.level_id')
        ->leftJoin('status','learner_schedule.status_id','=','status.status_id')
        ->where('learner_schedule.user_id', Auth::user()->user_id)
        ->whereIn('learner_schedule.status_id', [1,2])->get();

//        $learnerSchedule = DB::select('select * from learner_schedule');
        foreach ($learnerSchedule as $ls){
            $learnerScheduleTime = DB::select('select * from learner_schedule_time lst , day d where lst.day_id = d.day_id and learner_schedule_id = ?',[$ls->learner_schedule_id]);
            $ls->learnerScheduleTime = $learnerScheduleTime;

            $learnerRequest = DB::select('select * from learner_schedule_request where learner_schedule_id = ?',[$ls->learner_schedule_id]);
            if(count($learnerRequest)>0){
                $ls->requested = 0;
                
            }else{
                $ls->requested = 1;
            }

        }

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
