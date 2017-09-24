<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use DB;
use Illuminate\Http\Request;

class HistoryController extends BaseController
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
                $day = DB::table('day')->orderBy('day_name_full','asc')->get();
                $level = DB::table('level')->orderBy('level_name','asc')->get();
                $duration = DB::table('duration')->orderBy('duration_name','asc')->get();
        
                $learnerSchedule = DB::table('learner_schedule')
                ->select(['tutor_image_profile', 'tutor_firstname', 'tutor_lastname', 'subject_name', 'start_time', 'day.day_name_full', 'level_name', 'duration_name', 'status_name', 'tutor_tel'])
                ->join('subject','learner_schedule.subject_id','=','subject.subject_id')
                ->join('level','learner_schedule.level_id','=','level.level_id')
                ->join('day','day.day_id','=','learner_day.day_id')
                ->join('learner_day','learner_schedule.learner_schedule_id','=','learner_day.learner_schedule_id')
                ->join('duration','learner_schedule.duration_id','=','duration.duration_id')
                ->join('tutor','learner_schedule.tutor_id','=','tutor.tutor_id')
                ->join('schedule_status','learner_schedule.schedule_status_id','=','schedule_status.schedule_status_id')
                ->where('learner_schedule.schedule_status_id',5)
                ->orWhere('learner_schedule.schedule_status_id',6)
                ->paginate(10);
        
                //Set data to view
                $data = compact('subject', 'day','level','duration','learnerSchedule');
             
                return view('learner.LearnerHistory',$data);
            }
            public function indexTutor() {
                
                        //Get data from database
                        $subject = DB::table('subject')->orderBy('subject_name','asc')->get();
                        $day = DB::table('day')->orderBy('day_name_full','asc')->get();
                        $level = DB::table('level')->orderBy('level_name','asc')->get();
                        $duration = DB::table('duration')->orderBy('duration_name','asc')->get();
                
                        $tutorSchedule = DB::table('tutor_schedule')
                        ->select(['learner_img_profile', 'learner_firstname', 'learner_lastname', 'subject_name', 'start_time', 'day_name_full', 'level_name', 'duration_name', 'status_name', 'learner_tel'])
                        ->join('subject','tutor_schedule.subject_id','=','subject.subject_id')
                        ->join('level','tutor_schedule.level_id','=','level.level_id')
                        ->join('day','day.day_id','=','learner_day.day_id')
                        ->join('tutor_day','tutor_schedule.tutor_schedule_id','=','tutor_day.tutor_schedule_id')
                        ->join('duration','tutor_schedule.duration_id','=','duration.duration_id')
                        ->join('learner','tutor_schedule.learner_id','=','learner.learner_id')
                        ->join('tutor','tutor_schedule.tutor_id','=','tutor.tutor_id')
                        ->join('schedule_status','tutor_schedule.schedule_status_id','=','schedule_status.schedule_status_id')
                        ->where('tutor_schedule.schedule_status_id',5)
                        ->orWhere('tutor_schedule.schedule_status_id',6)
                        ->paginate(10);
                
                        //Set data to view
                        $data = compact('subject', 'day','level','duration','tutorSchedule');
                     
                        return view('tutor.TutorHistory',$data);
            }
}
