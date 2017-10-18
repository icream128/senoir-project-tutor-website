<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use DB;

class ShowDetail extends BaseController
{
   
    public function __construct(){
        
    }

    
    public function index(){
        $tutorSchedule = DB::table('tutor_schedule')
        ->select(['subject_name', 'dayfull', 'level_name', 'duration_name'])
        ->join('subject','tutor_schedule.subjects_id','=','subject.subjects_id')
        ->join('levels','tutor_schedule.levels_id','=','levels.levels_id')
        ->join('day','tutor_schedule.day_id','=','day.day_id')
        ->join('duration','tutor_schedule.duration_id','=','duration.duration_id')
        ->join('tutor','tutor_schedule.tutor_id','=','tutor.tutor_id')
      
      

        //Set data to view
        $data = compact('tutorSchedule');
     

        return view('learner.LearnerShowDetail',$data);
    }
    public function showSchedule(){
        $tutorSchedule = DB::table('tutor_schedule')
        ->select(['subject_name', 'dayfull', 'level_name', 'duration_name'])
        ->join('subject','tutor_schedule.subjects_id','=','subject.subjects_id')
        ->join('levels','tutor_schedule.levels_id','=','levels.levels_id')
        ->join('day','tutor_schedule.day_id','=','day.day_id')
        ->join('duration','tutor_schedule.duration_id','=','duration.duration_id')
        ->get() ;
        $showData = json_encode($tutorSchedule);
        $showData = compact('showData');
        return view('learner.LearnerHome',$showData);
       //return Datatables::of($tutorSchedule)->make();
    }
}
