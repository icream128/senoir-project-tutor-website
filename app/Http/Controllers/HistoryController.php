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

class HistoryController extends BaseController
{

    public function __construct(){
        $this->middleware('auth');
    }

    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */

    public function indexLearner() {
        //header
        $learnerProfile = DB::table('user')
        ->select(['img_profile', 'username'])
        ->where('user_id', Auth::user()->user_id)->first();
       
        $agreement = DB::table('agreement')
        ->select(['detail_lesson','location','end_course_date','img_profile', 'firstname', 'lastname', 'subject_name', 'learner_schedule_time.start_time', 'learner_schedule_time.end_time', 'level_name','price', 'status_name', 'user.tel', 'datetime','agreement.learner_schedule_id'])
        ->leftJoin('learner_schedule','agreement.learner_schedule_id','=','learner_schedule.learner_schedule_id')
        ->leftJoin('learner_schedule_time','learner_schedule.learner_schedule_id','=','learner_schedule_time.learner_schedule_id')
        ->leftJoin('user','agreement.tutor_id','=','user.user_id')
        ->leftJoin('subject','learner_schedule.subject_id','=','subject.subject_id')
        ->leftJoin('level','learner_schedule.level_id','=','level.level_id')
        ->leftJoin('status','learner_schedule.status_id','=','status.status_id')
        
        ->where('learner_schedule.user_id', Auth::user()->user_id)
        ->whereIn('learner_schedule.status_id', [6, 7])
        ->get();

        foreach ($agreement as $ls){
            $learnerScheduleTime = DB::select('select * from learner_schedule_time lst , day d where lst.day_id = d.day_id and learner_schedule_id = ?',[$ls->learner_schedule_id]);
            $ls->learnerScheduleTime = $learnerScheduleTime;
        }

        //Set data to view
        $data = compact('learnerProfile' ,'agreement');
        
        return view('learner.LearnerHistory',$data);
    }

    public function indexTutor() {

        //header
        $tutorProfile = DB::table('user')
        ->select(['img_profile', 'username'])
        ->where('user_id', Auth::user()->user_id)->first();
        
        //Get data from database
        $subject = DB::table('subject')->orderBy('subject_name','asc')->get();
        $day = DB::table('day')->orderBy('day_name','asc')->get();
        $level = DB::table('level')->orderBy('level_name','asc')->get();
        $duration = DB::table('duration')->orderBy('duration_name','asc')->get();

        $agreement = DB::table('agreement')
            ->select(['end_course_date', 'detail_lesson','location','end_course_date','img_profile', 'firstname', 'lastname', 'subject_name', 'learner_schedule_time.start_time', 'learner_schedule_time.end_time', 'level_name','price', 'status_name', 'user.tel', 'datetime','agreement.learner_schedule_id'])
            ->leftJoin('learner_schedule','agreement.learner_schedule_id','=','learner_schedule.learner_schedule_id')
            ->leftJoin('learner_schedule_time','learner_schedule.learner_schedule_id','=','learner_schedule_time.learner_schedule_id')
            ->leftJoin('user','agreement.user_id_request','=','user.user_id')
            ->leftJoin('subject','learner_schedule.subject_id','=','subject.subject_id')
            ->leftJoin('level','learner_schedule.level_id','=','level.level_id')
            ->leftJoin('status','learner_schedule.status_id','=','status.status_id')

            ->where('agreement.tutor_id', Auth::user()->user_id)
            ->whereIn('learner_schedule.status_id', [6, 7])
            ->get();

        foreach ($agreement as $ls){
            $learnerScheduleTime = DB::select('select * from learner_schedule_time lst , day d where lst.day_id = d.day_id and learner_schedule_id = ?',[$ls->learner_schedule_id]);
            $ls->learnerScheduleTime = $learnerScheduleTime;
        }

        //Set data to view
        $data = compact('subject', 'day','level','duration','tutorProfile' ,'agreement');
        
        return view('tutor.TutorHistory',$data);
    }
}
