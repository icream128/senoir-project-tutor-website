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

class ProfileController extends BaseController
{
   
    public function __construct(){
        
    }

    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */

    public function indexLearner() {

        //header
        $learnerProfile = DB::table('user')
        ->select(['img_profile'])
        ->where('user_id', Auth::user()->user_id)->first();

        //Get data from database
        $learnerProfilePage = DB::table('user')
        ->select(['user_id', 'firstname', 'lastname', 'nickname', 'school', 'level', 'grade', 'age', 'gender'
            ,'email','tel','address','ref_name','ref_relation','ref_tel','img_card','card_id','birthday'])
        ->where('user_id', Auth::user()->user_id)->first();
        
        //Set data to view
        $data = compact('learnerProfile', 'learnerProfilePage');
        
        return view('learner.LearnerProfile',$data);
  
    }

    public function indexTutor() {

        //header
        $tutorProfile = DB::table('user')
        ->select(['img_profile'])
        ->where('user_id', Auth::user()->user_id)->first();
        
        //Get data from database
        $tutorProfilePage = DB::table('user')
        ->select(['user_id', 'firstname', 'lastname', 'nickname', 'school', 'level', 'grade', 'experience', 'age', 'gender'
            ,'email','tel','address','ref_name','ref_relation','ref_tel','img_card','card_id','birthday','experience'])
        ->where('user_id', Auth::user()->user_id)->first();

        //Set data to view
        $data = compact('tutorProfile', 'tutorProfilePage');
     
        return view('tutor.TutorProfile',$data);
    }

}
