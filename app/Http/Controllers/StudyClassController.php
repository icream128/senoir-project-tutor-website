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

class StudyClassController extends BaseController
{
   
    public function __construct(){
        $this->middleware('auth');
    }

    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
 
    public function ClassBegin(request $request) {
        $learnerProfile = DB::table('user')
        ->select(['img_profile', 'username'])
        ->where('user_id', Auth::user()->user_id)->first();

        $frequency = DB::table('agreement')
        ->select(['img_profile','point','learner_schedule_time.start_time','learner_schedule_time.end_time','firstname', 'lastname','frequency.price', 'user.tel','agreement.agreement_id'])
        ->leftJoin('learner_schedule','agreement.learner_schedule_id','=','learner_schedule.learner_schedule_id')
        ->leftJoin('frequency','agreement.agreement_id','=','frequency.agreement_id')
        ->leftJoin('user','agreement.user_id_request','=','user.user_id')
        ->leftJoin('learner_schedule_time','learner_schedule.learner_schedule_id','=','learner_schedule_time.learner_schedule_id')
        ->where('learner_schedule.user_id', Auth::user()->user_id)
        ->whereIn('learner_schedule.status_id', [ 3, 5])
        ->where('agreement.agreement_id', $request->agreement_id)
        ->where('learner_schedule_time.learner_schedule_time_id', $request->learner_schedule_time_id)
        ->first();
        //dd($frequency);
        //Set data to view
        $data = compact('frequency','learnerProfile');
        return view('learner.LearnerStartClass',$data);
    }
}
