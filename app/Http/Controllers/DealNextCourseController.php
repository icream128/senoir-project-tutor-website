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
        
    }

   
    public function NextDeal(Request $request) {
        $learnerProfile = DB::table('user')
        ->select(['img_profile', 'username'])
        ->where('user_id', Auth::user()->user_id)->first();


          
        $agreement = $request->agreement_id;
        $data = compact('agreement','learnerProfile');
        // update status course
                
        
        return view('learner.LearnerDealNextCourse', $data);
    }
    public function save(Request $request){
        
        $data = array(); 
        $data['point'] = $request->star;
        $data['nextdeal'] = $request->nextdeal;
        $data['moredetail'] = $request->moredetail;
        $data['comment'] = $request->comment;
        $data['agreement_id'] = $request->agreement_id;
        $data['price'] = $request->total;
      
        $data['start_time'] = $request->start_time;
        $data['end_time'] = $request->end_time;
        DB::table('frequency')->insert($data);
        return view('learner.Save',$data);

        
     
    }
    
}
