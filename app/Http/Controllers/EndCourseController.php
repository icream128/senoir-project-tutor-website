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

class EndCourseController extends BaseController
{
   
    public function __construct(){
     
    }

    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function indexTutor() {
        
     
    }
            
    public function indexLearner(Request $request) {
        $learnerProfile = DB::table('user')
        ->select(['img_profile', 'username'])
        ->where('user_id', Auth::user()->user_id)->first();

         $agreement = DB::table('agreement')
        ->select(['agreement.learner_schedule_id'])
        ->where('agreement_id',$request->agreement_id)
        ->first();
        $data = compact('agreement','learnerProfile');
       // dd($data);                         
        return view('learner.LearnerEndCourse',$data);
    }
    public function SaveStatusLearner(Request $request) {
        
                 $status = DB::table('learner_schedule')
                ->where('learner_schedule_id',$request->agreement_id)
                ->update(['status_id'=>7]);
            }
}
