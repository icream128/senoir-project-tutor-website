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

class MyCourseController extends BaseController
{
   
    public function __construct(){
        $this->middleware('auth');
        $this->middleware('learner')->only('indexLearner');
    }

    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function indexTutor() {
        
        //header
        $tutorProfile = DB::table('user')
        ->select(['img_profile'])
        ->where('user_id', Auth::user()->user_id)->first();
    
        //Get data from database
        $subject = DB::table('subject')->orderBy('subject_name','asc')->get();
        $day = DB::table('day')->orderBy('day_name','asc')->get();
        $level = DB::table('level')->orderBy('level_name','asc')->get();
        $duration = DB::table('duration')->orderBy('duration_name','asc')->get();
       
        $agreement = DB::table('agreement')
        ->select(['img_profile', 'firstname', 'lastname', 'subject_name', 'start_time', 'end_time', 'level_name', 'duration_name', 'day_name','price', 'status_name', 'user.tel','agreement.learner_schedule_id'])
        ->leftJoin('learner_schedule','agreement.learner_schedule_id','=','learner_schedule.learner_schedule_id')
        ->leftJoin('frequency','agreement.agreement_id','=','frequency.agreement_id')
        ->leftJoin('user','learner_schedule.user_id','=','user.user_id')
        ->leftJoin('subject','learner_schedule.subject_id','=','subject.subject_id')
        ->leftJoin('level','learner_schedule.level_id','=','level.level_id')
        ->leftJoin('status','learner_schedule.status_id','=','status.status_id')
        ->leftJoin('learner_schedule_time','learner_schedule.learner_schedule_id','=','learner_schedule_time.learner_schedule_id')
        ->leftJoin('day','learner_schedule_time.day_id','=','day.day_id')
        ->leftJoin('duration','learner_schedule_time.duration_id','=','duration.duration_id')
        ->where('user_id_request', Auth::user()->user_id)
        ->whereIn('learner_schedule.status_id', [3, 5])
        ->paginate(10);

        //Set data to view
        $data = compact('subject', 'day','level','duration','tutorProfile' ,'agreement');
             
        return view('tutor.TutorMycourse',$data);
    }
            
    public function indexLearner() {
                
        //header
        $learnerProfile = DB::table('user')
        ->select(['img_profile'])
        ->where('user_id', Auth::user()->user_id)->first();
    
        //Get data from database
        $subject = DB::table('subject')->orderBy('subject_name','asc')->get();
        $day = DB::table('day')->orderBy('day_name','asc')->get();
        $level = DB::table('level')->orderBy('level_name','asc')->get();
        $duration = DB::table('duration')->orderBy('duration_name','asc')->get();
       
        $agreement = DB::table('agreement')
        ->select(['img_profile', 'firstname', 'lastname', 'subject_name', 'start_time', 'end_time', 'level_name', 'duration_name', 'day_name','price', 'status_name', 'user.tel','agreement.learner_schedule_id'])
        ->leftJoin('learner_schedule','agreement.learner_schedule_id','=','learner_schedule.learner_schedule_id')
        ->leftJoin('frequency','agreement.agreement_id','=','frequency.agreement_id')
        ->leftJoin('user','agreement.user_id_request','=','user.user_id')
        ->leftJoin('subject','learner_schedule.subject_id','=','subject.subject_id')
        ->leftJoin('level','learner_schedule.level_id','=','level.level_id')
        ->leftJoin('status','learner_schedule.status_id','=','status.status_id')
        ->leftJoin('learner_schedule_time','learner_schedule.learner_schedule_id','=','learner_schedule_time.learner_schedule_id')
        ->leftJoin('day','learner_schedule_time.day_id','=','day.day_id')
        ->leftJoin('duration','learner_schedule_time.duration_id','=','duration.duration_id')
        ->where('learner_schedule.user_id', Auth::user()->user_id)
        ->whereIn('learner_schedule.status_id', [3, 5])
        ->paginate(10);

        //Set data to view
        $data = compact('subject', 'day','level','duration','learnerProfile' ,'agreement');
                             
        return view('learner.LearnerMyCourse',$data);
    }
}
