<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth as Auth;

class DealCourseController extends BaseController
{
   
    public function __construct(){
        
    }

    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */

    public function indexLearner($learner_schedule_request_id) {
        //header
        $learnerProfile = DB::table('user')
        ->select(['img_profile', 'username'])
        ->where('user_id', Auth::user()->user_id)->first();

        $learnerScheduleRequest = DB::select('select * from learner_schedule_request lsq , user us where lsq.learner_schedule_request_id = ? and lsq.tutor_id = us.user_id',[$learner_schedule_request_id]);

        $learnerSchedule = DB::table('learner_schedule')
            ->select(['*'])
            ->join('subject','learner_schedule.subject_id','=','subject.subject_id')
            ->join('level','learner_schedule.level_id','=','level.level_id')
            ->join('learner_schedule_time','learner_schedule.learner_schedule_id','=','learner_schedule_time.learner_schedule_id')
            ->join('day','learner_schedule_time.day_id','=','day.day_id')
            ->join('duration','learner_schedule_time.duration_id','=','duration.duration_id')
            ->join('user','learner_schedule.user_id','=','user.user_id')
            ->join('status','learner_schedule.status_id','=','status.status_id')
            ->where('learner_schedule.learner_schedule_id','=',$learnerScheduleRequest[0]->learner_schedule_id)
            ->first();

        //Set data to view
        $data = compact('learnerProfile','learnerScheduleRequest','learnerSchedule');

        return view('learner.LearnerDeal',$data);
    }

    public function createAgreement(Request $request){

        $learnerScheduleRequest = DB::select('select * from learner_schedule_request where learner_schedule_request_id = ?',[$request->get('learner_schedule_request_id')]);

        if(isset($learnerScheduleRequest)) {
            $learnerSchedule = DB::select('select * from learner_schedule where learner_schedule_id = ?', [$learnerScheduleRequest[0]->learner_schedule_id]);

            $insert = DB::insert('insert into agreement (price,detail_lesson,detail_transport,detail_location,user_id_request,
                            learner_schedule_id,tutor_id,start_course) VALUES (?,?,?,?,?,?,?,?)',
                [$learnerSchedule[0]->price_per_hour, $request->get('detail_lesson'), $request->get('detail_transport'), $request->get('detail_location'), Auth::user()->user_id,$learnerScheduleRequest[0]->learner_schedule_id, $learnerScheduleRequest[0]->tutor_id, $request->get('startdate')]);

            if($insert){
                DB::update('update learner_schedule set status_id = 3 where learner_schedule_id = ?',[$learnerScheduleRequest[0]->learner_schedule_id]);
            }

            return redirect('learnermycourse');
        }
    }

}