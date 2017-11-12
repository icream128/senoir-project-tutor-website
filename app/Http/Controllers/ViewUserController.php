<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use DB;
use Datatables;
use Illuminate\Http\Request;

class ViewUserController extends BaseController
{
    public function __construct(){
        
    }
    public function index(){
        //header
        $adminProfile = DB::table('user')
        ->select(['img_profile', 'username'])
        ->where('user_id', Auth::user()->user_id)->first();

        $userProfile = DB::table('user')
        ->select(['firstname', 'lastname', 'user_id', 'role_name', 'status_name', 'user.status_user_id'])
        ->join('role', 'user.role_id', '=', 'role.role_id')
        ->join('status_user', 'user.status_user_id', '=', 'status_user.status_user_id')
        ->whereIn('user.role_id', [1, 2])->get();

        
        foreach ($userProfile as $ls){
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
        $data = compact('adminProfile', 'userProfile');

        return view('admin.viewuser', $data);
    }

    public function updatestop($user_id) {
        DB::update('update user set status_user_id = 0 WHERE user_id = ?', [$user_id]);
 
        return redirect(url('viewuser'));
    }
    
    public function updatepass($user_id) {
        DB::update('update user set status_user_id = 1 WHERE user_id = ?', [$user_id]);
 
        return redirect(url('viewuser'));
    }
}


