<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use DB;
use Illuminate\Http\Request;

class StatusRequestController extends BaseController
{
   
    public function __construct(){
        
    }

    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */

    public function indexLearner() {
        
        //Get data from database
        $subject = DB::table('subject')->orderBy('subject_name','asc')->get();
        $day = DB::table('day')->orderBy('dayfull','asc')->get();
        $level = DB::table('level')->orderBy('level_name','asc')->get();
        $duration = DB::table('duration')->orderBy('duration_name','asc')->get();
        
        $learnerSchedule = DB::table('learner_schedule')
        ->select(['tutor_image_profile', 'tutor_firstname', 'tutor_lastname', 'subject_name', 'start_time', 'day_name_full', 'level_name', 'duration_name', 'status_name', 'tutor_tel'])
        ->join('subject','learner_schedule.subject_id','=','subject.subject_id')
        ->join('level','learner_schedule.level_id','=','level.level_id')
        ->join('day','learner_schedule.day_id','=','day.day_id')
        ->join('duration','learner_schedule.duration_id','=','duration.duration_id')
        ->join('tutor','learner_schedule.tutor_id','=','tutor.tutor_id')
        ->join('schedule_status','learner_schedule.status_sch_id','=','schedule_status.status_sch_id')
        ->where('learner_schedule.status_sch_id',1)
        ->orWhere('learner_schedule.status_sch_id',2)
        ->paginate(10);
        
        //Set data to view
        $data = compact('firstname', 'subject', 'day','level','duration','learnerSchedule');
             
        return view('learner.LearnerStatusRequest',$data);
    }
    public function indexTutor() {
        
                //Get data from database
                $subject = DB::table('subject')->orderBy('subject_name','asc')->get();
                $day = DB::table('day')->orderBy('dayfull','asc')->get();
                $level = DB::table('level')->orderBy('level_name','asc')->get();
                $duration = DB::table('duration')->orderBy('duration_name','asc')->get();
        
                $tutorSchedule = DB::table('tutor_schedule')
                ->select(['learner_img_profile', 'learner_firstname', 'learner_lastname', 'subject_name', 'start_time', 'day_name_full', 'level_name', 'duration_name', 'status_name', 'learner_tel'])
                ->join('subject','tutor_schedule.subject_id','=','subject.subject_id')
                ->join('level','tutor_schedule.level_id','=','levels.level_id')
                ->join('day','tutor_schedule.day_id','=','day.day_id')
                ->join('duration','tutor_schedule.duration_id','=','duration.duration_id')
                ->join('learner','tutor_schedule.learner_id','=','learner.learner_id')
                ->join('tutor','tutor_schedule.tutor_id','=','tutor.tutor_id')
                ->join('schedule_status','tutor_schedule.status_sch_id','=','schedule_status.status_sch_id')
                ->where('tutor_schedule.status_sch_id',1)
                ->orWhere('tutor_schedule.status_sch_id',2)
                ->paginate(10);
        
                //Set data to view
                $data = compact('subject', 'day','level','duration','tutorSchedule');
             
                return view('tutor.TutorRequestStatus',$data);
            }
}
