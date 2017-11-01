<?php

namespace App\Http\Controllers;

use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use DB;
use Datatables;

class TutorHomeController extends BaseController
{
    public function __construct(){

    }

    public function index() {
        //header
        $tutorProfile = [];
        if(Auth::check()) {
            $tutorProfile = DB::table('user')
                ->select(['img_profile', 'username'])
                ->where('user_id', Auth::user()->user_id)->first();
        }
        //Get data from database
        $subject = DB::table('subject')->orderBy('subject_name','asc')->get();
        $day = DB::table('day')->orderBy('day_id','asc')->get();
        $level = DB::table('level')->orderBy('level_id','asc')->get();
        $duration = DB::table('duration')->orderBy('duration_id','asc')->get();

        $learnerSchedule = DB::table('learner_schedule')
        ->select(['*'])
        ->join('subject','learner_schedule.subject_id','=','subject.subject_id')
        ->join('level','learner_schedule.level_id','=','level.level_id')
        ->join('user','learner_schedule.user_id','=','user.user_id')
        ->join('status','learner_schedule.status_id','=','status.status_id')
            ->where('learner_schedule.status_id','1')
            ->orWhere('learner_schedule.status_id','2')
        ->get();

        if(Auth::check()) {
            $learnerScheduleRequest = DB::select('select * from learner_schedule_request lsq , learner_schedule ls where lsq.learner_schedule_id = ls.learner_schedule_id and ls.status_id = 2 and lsq.tutor_id = ?', [Auth::user()->user_id]);

            $ls_requested = array();

            foreach ($learnerScheduleRequest as $lsq) {
//            $collection->push($lsq->learner_schedule_id);
                array_push($ls_requested, $lsq->learner_schedule_id);
            }

            foreach ($learnerSchedule as $ls) {
                $learnerScheduleTime = DB::select('select * from learner_schedule_time lst , day d where lst.day_id = d.day_id and learner_schedule_id = ?', [$ls->learner_schedule_id]);

                $ls->requested = in_array($ls->learner_schedule_id, $ls_requested);
                $ls->learnerScheduleTime = $learnerScheduleTime;

            }


            //Set data to view
            $data = compact('subject', 'day', 'level', 'duration', 'tutorProfile', 'learnerSchedule', 'ls_requested', 'learnerScheduleRequest');

            return view('tutor.TutorHome', $data);
        }else{
            foreach ($learnerSchedule as $ls) {
                $learnerScheduleTime = DB::select('select * from learner_schedule_time lst , day d where lst.day_id = d.day_id and learner_schedule_id = ?', [$ls->learner_schedule_id]);
                $ls->learnerScheduleTime = $learnerScheduleTime;

            }


            //Set data to view
            $data = compact('subject', 'day', 'level', 'duration', 'tutorProfile', 'learnerSchedule');

            return view('tutor.TutorHome', $data);
        }
    }

    // public function showSchedule(){
    //     $learnerSchedule = DB::table('learner_schedule')
    //     ->select(['subject_name', 'dayfull', 'level_name', 'duration_name'])
    //     ->join('subject','learner_schedule.subjects_id','=','subject.subjects_id')
    //     ->join('levels','learner_schedule.levels_id','=','levels.levels_id')
    //     ->join('day','learner_schedule.day_id','=','day.day_id')
    //     ->join('duration','learner_schedule.duration_id','=','duration.duration_id')
    //     ->get() ;
    //     $showData = json_encode($learnerSchedule);
    //     $showData = compact('showData');
    //     return view('tutor.home',$showData);
    //    //return Datatables::of($tutorSchedule)->make();
    // }

    public function tutor_send_request(Request $rq){
        $ls_id = $rq->get('learner_schedule_id');
        $tutor_id = Auth::user()->user_id;
        $insert = DB::insert('insert into learner_schedule_request (learner_schedule_id,tutor_id) VALUES (?,?)',[$ls_id,$tutor_id]);
        DB::update('update learner_schedule set status_id = 2 where learner_schedule_id = ?',[$ls_id]);
        return redirect('/tutorstatusrequest');
    }
}