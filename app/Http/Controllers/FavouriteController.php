<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use DB;
use Illuminate\Http\Request;

class FavouriteController extends BaseController
{
   
    public function __construct(){
        
    }

    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */

    // public function indexLearner() {
    //     //Get data from database
        
    //     $subject = DB::table('subject')->orderBy('subject_name','asc')->get();
    //     $day = DB::table('day')->orderBy('day_name_full','asc')->get();
    //     $level = DB::table('level')->orderBy('level_name','asc')->get();
    //     $duration = DB::table('duration')->orderBy('duration_name','asc')->get();

    //     $learnerSchedule = DB::table('learner_schedule')
    //     ->select(['tutor_image_profile', 'tutor_firstname', 'tutor_lastname', 'subject_name', 'start_time', 'day_name_full', 'level_name', 'duration_name', 'status_name', 'tutor_tel'])
    //     ->join('subject','learner_schedule.subject_id','=','subject.subject_id')
    //     ->join('level','learner_schedule.level_id','=','levels.level_id')
    //     ->join('day','learner_schedule.day_id','=','day.day_id')
    //     ->join('duration','learner_schedule.duration_id','=','duration.duration_id')
    //     ->join('tutor','learner_schedule.tutor_id','=','tutor.tutor_id')
    //     ->join('schedule_status','learner_schedule.status_sch_id','=','schedule_status.status_sch_id')
    //     ->where('learner_schedule.status_sch_id',3)
    //     ->orWhere('learner_schedule.status_sch_id',4)
    //     ->paginate(10);

    //     //Set data to view
    //     $data = compact('firstname', 'subject', 'day','level','duration','learnerSchedule');
     
    //     return view('learner.LearnerMycourse',$data);
    // }
    public function indexTutor() {
        
                //Get data from database
                // $subject = DB::table('subject')->orderBy('subject_name','asc')->get();
                // $day = DB::table('day')->orderBy('day_name','asc')->get();
                // $level = DB::table('level')->orderBy('level_name','asc')->get();
                // $duration = DB::table('duration')->orderBy('duration_name','asc')->get();
        
                $agreement = DB::table('agreement')
                ->select(['detail_lesson', 'detail_transport', 'detail_location'])
                ->join('frequency','agreement.agreement_id','=','frequency.agreement_id')
                ->join('learner_schedule','agreement.learner_schedule_id','=','learner_schedule.learner_schedule_id')
                ->join('user','learner_schedule.user_id','=','user.user_id')
                ->join('subject','learner_schedule.subject_id','=','subject.subject_id')
                ->join('level','learner_schedule.level_id','=','level.level_id')
                ->join('status','learner_schedule.status_id','=','status.status_id')
                ->join('learner_schedule_time','learner_schedule.learner_schedule_id','=','learner_schedule_time.learner_schedule_id')
                ->join('day','learner_schedule_time.day_id','=','day.day_id')
                ->join('duration','learner_schedule_time.duration_id','=','duration.duration_id')
                ->where('learner_schedule.status_id',8)
                // ->orWhere('tutor_schedule.status_sch_id',4)
                ->paginate(10);
        
                //Set data to view
                $data = compact('agreement');
             
                return view('tutor.TutorMycourse',$data);
            }
}