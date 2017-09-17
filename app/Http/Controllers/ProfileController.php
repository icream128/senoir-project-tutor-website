<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use DB;
use Illuminate\Http\Request;

class ProfileController extends BaseController
{
   
    public function __construct(){
        
    }

    public function index(){
      
        $learner = DB::table('learner')->where('learner_id',5)->get();
        $data = compact('learner');

        return view('learner.LearnerProfile',$data);
    
    }
  
}
