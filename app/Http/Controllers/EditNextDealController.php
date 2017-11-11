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

class EditNextDealController extends BaseController
{
   
    public function __construct(){
        $this->middleware('auth');
    }

   
    public function editNextDeal($frequency_id) {
        $learnerProfile = DB::table('user')
        ->select(['img_profile', 'username','learner_schedule.price_per_hour'])
        ->join('learner_schedule','learner_schedule.user_id','=','user.user_id')
        ->where('user.user_id', Auth::user()->user_id)->first();


        $frequency = DB::table('frequency')
        ->select(['frequency_id', 'start_time', 'end_time', 'point', 'comment', 'moredetail', 'nextdeal', 'price'])
        ->where('frequency_id', $frequency_id)
        ->get();
        
        $data = compact('learnerProfile', 'frequency');
        
        return view('learner.LearnerEditNextStudy', $data);
    }
    public function save(Request $request, $frequency_id){

        DB::update('update frequency SET start_time = ?, end_time = ?, comment = ? , moredetail = ? , nextdeal = ?, price = ? 
        WHERE frequency_id = ?',
        [$request->get('start_time'), $request->get('end_time'), $request->get('comment'),$request->get('moredetail'),$request->get('nextdeal'), $request->get('total'), $frequency_id]);

        return redirect('/learnermycourse');

        
     
    }
    
}
