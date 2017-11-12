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

class ProfileShortController extends BaseController
{
   
    public function __construct(){
        $this->middleware('auth');
    }

    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */

    public function indexLearner($tutor_id) {

        //header
        $learnerProfile = DB::table('user')
        ->select(['img_profile', 'username'])
        ->where('user_id', Auth::user()->user_id)->first();

        //Get data from database
        $learnerProfilePage = DB::table('user')
        ->select(['user_id','img_profile', 'firstname', 'lastname', 'nickname', 'school', 'level', 'grade', 'experience', 'age', 'gender'
            ,'email','tel','address','ref_name','ref_relation','ref_tel','img_card','card_id','birthday'])
        ->where('user_id', $tutor_id)->get();

        foreach ($learnerProfilePage as $ls){
            $rating = DB::table('frequency')
            ->select('point')
            ->join('agreement', 'frequency.agreement_id' , '=', 'agreement.agreement_id')
            ->where('agreement.tutor_id', $ls->user_id)
            ->get();

            $rating1 = DB::table('frequency')
            ->select('point')
            ->join('agreement', 'frequency.agreement_id' , '=', 'agreement.agreement_id')
            ->where('agreement.tutor_id', $ls->user_id)
            ->sum('point');
            
            if ($rating1 == 0) {
                $sumnumber = 0;
                $total = 1;
                $avg = $sumnumber/$total;
            } else {
                $sumnumber = $rating->sum('point');
                $total = $rating->count('point');
                $avg = $sumnumber/$total;
            }

            $countrate = DB::table('frequency')
            ->select('point')
            ->join('agreement', 'frequency.agreement_id' , '=', 'agreement.agreement_id')
            ->where('agreement.tutor_id', $ls->user_id)
            ->orWhere('agreement.user_id_request', $ls->user_id)
            ->count('point');
            
            
            $ls->countrate = $countrate;

            if ($avg >= 4.5) {
                $ls->frequency = round($avg);
            } else {
                $ls->frequency = floor($avg);
            }
        }
        //Set data to view
        $data = compact('learnerProfile', 'learnerProfilePage');
        
        return view('learner.LearnerShortProfile',$data);
  
    }

    public function indexTutor($user_id_request) {

        //header
        $tutorProfile = DB::table('user')
        ->select(['img_profile', 'username'])
        ->where('user_id', Auth::user()->user_id)->first();
        
        //Get data from database
        $tutorProfilePage = DB::table('user')
        ->select(['user_id','img_profile', 'firstname', 'lastname', 'nickname', 'school', 'level', 'grade', 'experience', 'age', 'gender'
            ,'email','tel','address','ref_name','ref_relation','ref_tel','img_profile', 'img_card','card_id','birthday','experience'])
        ->where('user_id', $user_id_request)->first();

        //Set data to view
        $data = compact('tutorProfile', 'tutorProfilePage');
     
        return view('tutor.TutorShortProfile',$data);
    }

}
