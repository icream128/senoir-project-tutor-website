<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use DB;

class CreateCourseLearner extends BaseController
{
   
    public function __construct(){
        
    }

    public function index(){
      
        $subject = DB::table('subject')->orderBy('subject_name','asc')->get();
        $day = DB::table('day')->orderBy('dayfull','asc')->get();
        $level = DB::table('levels')->orderBy('level_name','asc')->get();
        $duration = DB::table('duration')->orderBy('duration_name','asc')->get();

  
        $data = compact('subject','day','level','duration');

        return view('learner.LearnerCreateCourse',$data);
    
    }
}
