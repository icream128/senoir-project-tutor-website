<?php

namespace App\Http\Controllers;

use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use DB;
use Datatables;

class LearnerHomeController extends BaseController
{
    public function __construct(){
        
    }
    public function index(){
        // header
        $learnerProfile = [];
        if(\Illuminate\Support\Facades\Auth::check()) {
            $learnerProfile = DB::table('user')
                ->select(['img_profile'])
                ->where('user_id', Auth::user()->user_id)->first();
        }
        //Get data from database
        $subject = DB::table('subject')->orderBy('subject_name','asc')->get();
        $day = DB::table('day')->orderBy('day_name','asc')->get();
        $level = DB::table('level')->orderBy('level_name','asc')->get();
        $duration = DB::table('duration')->orderBy('duration_name','asc')->get();

        $learnerSchedule = DB::table('learner_schedule')
        ->select(['subject_name','day_name', 'level_name', 'duration_name'])
        ->join('subject','learner_schedule.subject_id','=','subject.subject_id')
        ->join('level','learner_schedule.level_id','=','level.level_id')
        ->join('learner_schedule_time','learner_schedule.learner_schedule_id','=','learner_schedule_time.learner_schedule_id')
        ->join('day','learner_schedule_time.day_id','=','day.day_id')
        ->join('duration','learner_schedule_time.duration_id','=','duration.duration_id')
        ->join('user','learner_schedule.user_id','=','user.user_id')    
        ->join('status','learner_schedule.status_id','=','status.status_id')
        ->paginate(10);

        //Set data to view
        $data = compact('subject','day','level','duration','learnerProfile' ,'learnerSchedule');

        return view('learner.LearnerHome',$data);
    }
    // public function showSchedule(){
    //     $tutorSchedule = DB::table('tutor_schedule')
    //     ->select(['subject_name', 'dayfull', 'level_name', 'duration_name'])
    //     ->join('subject','tutor_schedule.subjects_id','=','subject.subjects_id')
    //     ->join('levels','tutor_schedule.levels_id','=','levels.levels_id')
    //     ->join('day','tutor_schedule.day_id','=','day.day_id')
    //     ->join('duration','tutor_schedule.duration_id','=','duration.duration_id')
    //     ->get() ;
    //     $showData = json_encode($tutorSchedule);
    //     $showData = compact('showData');
    //     return view('learner.LearnerHome',$showData);
    //    //return Datatables::of($tutorSchedule)->make();
    // }
}
