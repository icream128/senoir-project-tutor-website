<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use DB;
use Input;
use Illuminate\Http\Request;

class CreateCourseController extends BaseController
{
   
    public function __construct(){
        
    }

    public function indexLearner(){
      
        $subject = DB::table('subject')->orderBy('subject_name','asc')->get();
        $day = DB::table('day')->orderBy('day_name','asc')->get();
        $level = DB::table('level')->orderBy('level_name','asc')->get();
        $duration = DB::table('duration')->orderBy('duration_name','asc')->get();
  
        $data = compact('subject','day','level','duration');

        return view('learner.LearnerCreateCourse',$data);
    
    }
    public function indexTutor(){
        
          $subject = DB::table('subject')->orderBy('subject_name','asc')->get();
          $day = DB::table('day')->orderBy('day_name','asc')->get();
          $level = DB::table('level')->orderBy('level_name','asc')->get();
          $duration = DB::table('duration')->orderBy('duration_name','asc')->get();
    
          $data = compact('subject','day','level','duration');
  
          return view('tutor.TutorCreateCourse',$data);
      
      }
    
    public function insertLearner(Request $insert){
        
        //$tutor_schedule = new TutorSchedule();
        $learner_schedule = DB::table('learner_schedule')->get();
                
                $learner_schedule->learner_id = 1 ;
                $learner_schedule->status_sch_id = 1 ;
                $subject = DB::table('subject')->get();
                $day = DB::table('day')->get();
                $level = DB::table('level')->get();
                $duration = DB::table('duration')->get();
                
                // $data = array();
                // $data['day_id'] = $request->day;
                // $data['subject_id'] = $request->subject;
                // $data['level_id'] = $request->level;
                // $data['duration_id'] = $request->duration;
                // $data = DB::table('learner_schedule')->insert($data);
        
               
                
      
      }
      public function insertTutor(Request $insert){
        
        //$tutor_schedule = new TutorSchedule();
        // $tutor_schedule = DB::table('tutor_schedule')->get();
                
        //         $tutor_schedule->learner_id = 1 ;
        //         $tutor_schedule->status_sch_id = 1 ;
               


        //         $data = array();
        //         $data['day_id'] = $request->day;
        //         $data['subject_id'] = $request->subject;
        //         $data['level_id'] = $request->level;
        //         $data['duration_id'] = $request->duration;
        //         $data = DB::table('tutor_schedule')->insert($data);
        
               
      
      }
}
