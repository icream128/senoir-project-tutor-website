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

class ViewCourseController extends BaseController
{
    public function __construct(){
        
    }
    public function index(){
        //header
        $adminProfile = DB::table('user')
        ->select(['img_profile', 'username'])
        ->where('user_id', Auth::user()->user_id)->first();

        $courseDetail = DB::table('learner_schedule')
        ->select(['learner_schedule.learner_schedule_id', 'agreement_id', 'subject_name', 'agreement.tutor_id', 'learner_schedule.user_id', 'firstname', 'lastname', 'status_name'])
        ->leftJoin('agreement','learner_schedule.learner_schedule_id','=','agreement.learner_schedule_id')        
        ->leftJoin('subject','learner_schedule.subject_id','=','subject.subject_id')
        ->leftJoin('level','learner_schedule.level_id','=','level.level_id')
        ->leftJoin('status','learner_schedule.status_id','=','status.status_id')
        ->leftJoin('user','learner_schedule.user_id','=','user.user_id')
        ->get();

        foreach ($courseDetail as $ls){
            $frequency = DB::table('frequency')
            ->select(['create_frequency', 'nextdeal','moredetail','study_date','comment','point','frequency.price', 'agreement_id', 'start_time', 'end_time',])
            ->where('agreement_id', $ls->agreement_id)
            ->get();

            $ls->frequency = $frequency;
        }

        foreach ($courseDetail as $ls){
            $courseDetail1 = DB::table('agreement')
            ->select(['agreement.tutor_id', 'firstname', 'lastname'])
            ->leftJoin('user','agreement.tutor_id','=','user.user_id')
            ->where('agreement.agreement_id', $ls->agreement_id)
            ->get();

            $ls->tutor = $courseDetail1;
        }
        
        //Set data to view
        $data = compact('adminProfile', 'courseDetail', 'agr');

        return view('admin.viewcourse', $data);
    }

    public function delete($user_id) {
        DB::delete('delete from user WHERE user_id = ?', [$user_id]);
 
        return redirect(url('viewuser'));
    }
}


