<?php

namespace App\Http\Controllers;

use Hash;
use Auth;
use App\users;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use DB;
use Illuminate\Http\Request;

class LearnerEditCourseController extends BaseController
{
   
    public function __construct(){
        
    }

    public function edit($learner_schedule_id) {
        //header
        $learnerProfile = DB::table('user')
        ->select(['img_profile'])
        ->where('user_id', Auth::user()->user_id)->first();
        
        $subject = DB::table('subject')->orderBy('subject_name','asc')->get();
        $day = DB::table('day')->orderBy('day_id','asc')->get();
        $level = DB::table('level')->orderBy('level_id','asc')->get();
        $duration = DB::table('duration')->orderBy('duration_id','asc')->get();
        
        $learnerSchedule = DB::table('learner_schedule')
        ->where('learner_schedule_id', $learner_schedule_id)->first();

        $data = compact('subject','day','level','duration', 'learnerProfile', 'learnerSchedule');
        return view('learner.LearnerEditCourse', $data);
    }

    public function updated(Request $request, $learner_schedule_id) {

        $sql = 'UPDATE `learner_schedule` SET `subject` = subject WHERE (`learner_schedule_id` = $learner_schedule_id)';

        DB::table('learner_schedule')
        ->where('learner_schedule_id', $learner_schedule_id)
        ->update(['subject' => $request->subject],['level' => $request->level]);
        
    
        return redirect('learnercoursestatus');
    }

}

// DB::table('learner_schedule_time_id')->where('learner_schedule_id', )->delete();
