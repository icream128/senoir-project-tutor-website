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

class DealNextCourseController extends BaseController
{
   
    public function __construct(){
        $this->middleware('auth');
    }

   
    public function NextDeal(Request $request) {
        $learnerProfile = DB::table('user')
        ->select(['img_profile', 'username','learner_schedule.price_per_hour'])
        ->join('learner_schedule','learner_schedule.user_id','=','user.user_id')
        ->where('user.user_id', Auth::user()->user_id)->first();


          
        $agreement = $request->agreement;
        $start_time = $request->start_time;
        $end_time = $request->end_time;
        $data = compact('agreement','learnerProfile','end_time','start_time');
        // update status course
                
        
        return view('learner.LearnerDealNextCourse', $data);
    }
    public function save(Request $request){
        $learnerProfile = DB::table('user')
        ->select(['img_profile', 'username'])
        ->where('user.user_id', Auth::user()->user_id)->first();

        $data = array(); 
        $data['point'] = $request->star;
        $data['nextdeal'] = $request->nextdeal;
        $data['moredetail'] = $request->moredetail;
        $data['comment'] = $request->comment;
        $data['agreement_id'] = $request->agreement;
        $data['price'] = $request->total;
      
        $data['start_time'] = $request->start_time;
        $data['end_time'] = $request->end_time;
       
        //dd($data);
        DB::table('frequency')->insert($data);

        $status = DB::table('learner_schedule')
        ->select(['agreement.learner_schedule_id'])
        ->join('agreement','agreement.learner_schedule_id','=','learner_schedule.learner_schedule_id')
        ->where('agreement_id',$request->agreement)->first();

         DB::table('learner_schedule')->where('learner_schedule_id',$status->learner_schedule_id)->update(['status_id'=>5]);


        $date = array();
        $data = compact('point','nextdeal','moredetail','comment','agreement_id','price','start_time','end_time','learnerProfile');
        return redirect('/learnermycourse');

        
     
    }
    
}
