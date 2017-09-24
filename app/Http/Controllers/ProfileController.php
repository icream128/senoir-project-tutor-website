<?php

namespace App\Http\Controllers;

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
        //Get data from database

        $learnerProfile = DB::table('users')
        ->select(['name'])
        // ->join('subject','learner_schedule.subjects_id','=','subject.subjects_id')
        // ->join('levels','learner_schedule.levels_id','=','levels.levels_id')
        // ->join('day','learner_schedule.day_id','=','day.day_id')
        // ->join('duration','learner_schedule.duration_id','=','duration.duration_id')
        // ->join('tutor','learner_schedule.tutor_id','=','tutor.tutor_id')
        // ->join('schedule_status','learner_schedule.status_sch_id','=','schedule_status.status_sch_id')
        ->where('id', Auth::user()->id)->first();

        //Set data to view
        $data = compact('learnerProfile');
     
        return view('learner.LearnerProfile',$data);
  
}
