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

class ProfileController extends BaseController
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
        $learnerProfilePage = DB::table('user')
<<<<<<< HEAD
        ->select(['user_id', 'firstname', 'lastname', 'nickname', 'school', 'level', 'grade', 'age', 'gender'])
        // ->join('subject','learner_schedule.subjects_id','=','subject.subjects_id')
        // ->join('levels','learner_schedule.levels_id','=','levels.levels_id')
        // ->join('day','learner_schedule.day_id','=','day.day_id')
        // ->join('duration','learner_schedule.duration_id','=','duration.duration_id')
        // ->join('tutor','learner_schedule.tutor_id','=','tutor.tutor_id')
        // ->join('schedule_status','learner_schedule.status_sch_id','=','schedule_status.status_sch_id')
=======
        ->select(['firstname', 'lastname', 'nickname', 'school', 'level', 'grade', 'age', 'gender'
            ,'email','tel','address','ref_name','ref_relation','ref_tel','img_card','card_id','birthday'])
>>>>>>> 0a6d2a7c3e5967de5dbe37712bb912fe2be31244
        ->where('user_id', Auth::user()->user_id)->first();
        
        //Set data to view
        $data = compact('learnerProfile', 'learnerProfilePage');
        
        return view('learner.LearnerProfile',$data);
  
    }

    public function indexTutor() {
<<<<<<< HEAD
        
=======

>>>>>>> 0a6d2a7c3e5967de5dbe37712bb912fe2be31244
        //header
        $tutorProfile = DB::table('user')
        ->select(['img_profile'])
        ->where('user_id', Auth::user()->user_id)->first();
<<<<<<< HEAD
                
        //Get data from database
        $tutorProfilePage = DB::table('user')
        ->select(['user_id', 'firstname', 'lastname', 'nickname', 'school', 'level', 'grade', 'experience', 'age', 'gender'])
        // ->join('subject','learner_schedule.subjects_id','=','subject.subjects_id')
        // ->join('levels','learner_schedule.levels_id','=','levels.levels_id')
        // ->join('day','learner_schedule.day_id','=','day.day_id')
        // ->join('duration','learner_schedule.duration_id','=','duration.duration_id')
        // ->join('tutor','learner_schedule.tutor_id','=','tutor.tutor_id')
        // ->join('schedule_status','learner_schedule.status_sch_id','=','schedule_status.status_sch_id')
=======
        
        //Get data from database
        $tutorProfilePage = DB::table('user')
        ->select(['firstname', 'lastname', 'nickname', 'school', 'level', 'grade', 'experience', 'age', 'gender'
            ,'email','tel','address','ref_name','ref_relation','ref_tel','img_card','card_id','birthday','experience'])
>>>>>>> 0a6d2a7c3e5967de5dbe37712bb912fe2be31244
        ->where('user_id', Auth::user()->user_id)->first();

        //Set data to view
        $data = compact('tutorProfile', 'tutorProfilePage');
<<<<<<< HEAD
             
=======
     
>>>>>>> 0a6d2a7c3e5967de5dbe37712bb912fe2be31244
        return view('tutor.TutorProfile',$data);
    }

}
