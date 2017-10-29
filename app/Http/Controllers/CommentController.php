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

class CommentController extends BaseController
{
   
    public function __construct(){
        
    }

    public function indexLearner() {
        //header
        $learnerProfile = DB::table('user')
        ->where('user_id', Auth::user()->user_id)->first();

        $data = compact('learnerProfile');
        return view('learner.LearnerComment', $data);
    }
 
    
}
