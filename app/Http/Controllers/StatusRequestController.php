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

class StatusRequestController extends BaseController
{

    public function __construct(){
        $this->middleware('auth');
    }

    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */

    // public function indexLearner() {
        
    //     //Get data from database
    //     $subject = DB::table('subject')->orderBy('subject_name','asc')->get();
    //     $day = DB::table('day')->orderBy('dayfull','asc')->get();
    //     $level = DB::table('level')->orderBy('level_name','asc')->get();
    //     $duration = DB::table('duration')->orderBy('duration_name','asc')->get();
        
    //     $learnerSchedule = DB::table('learner_schedule')
    //     ->select(['tutor_image_profile', 'tutor_firstname', 'tutor_lastname', 'subject_name', 'start_time', 'day_name_full', 'level_name', 'duration_name', 'status_name', 'tutor_tel'])
    //     ->join('subject','learner_schedule.subject_id','=','subject.subject_id')
    //     ->join('level','learner_schedule.level_id','=','level.level_id')
    //     ->join('day','learner_schedule.day_id','=','day.day_id')
    //     ->join('duration','learner_schedule.duration_id','=','duration.duration_id')
    //     ->join('tutor','learner_schedule.tutor_id','=','tutor.tutor_id')
    //     ->join('schedule_status','learner_schedule.status_sch_id','=','schedule_status.status_sch_id')
    //     ->where('learner_schedule.status_sch_id',1)
    //     ->orWhere('learner_schedule.status_sch_id',2)
    //     ->paginate(10);
        
    //     //Set data to view
    //     $data = compact('firstname', 'subject', 'day','level','duration','learnerSchedule');
             
    //     return view('learner.LearnerStatusRequest',$data);
    // }
    public function indexTutor() {
        
        //header
        $tutorProfile = DB::table('user')
        ->select(['img_profile', 'username'])
        ->where('user_id', Auth::user()->user_id)->first();
                
//        $agreement = DB::table('agreement')
//        ->select(['img_profile', 'firstname', 'lastname', 'subject_name', 'start_time', 'level_name', 'duration_name', 'day_name','price', 'status_name', 'user.tel','agreement.learner_schedule_id'])
//        ->leftJoin('learner_schedule','agreement.learner_schedule_id','=','learner_schedule.learner_schedule_id')
//        ->leftJoin('frequency','agreement.agreement_id','=','frequency.agreement_id')
//
//        ->leftJoin('user','learner_schedule.user_id','=','user.user_id')
//        ->leftJoin('subject','learner_schedule.subject_id','=','subject.subject_id')
//
//        ->leftJoin('level','learner_schedule.level_id','=','level.level_id')
//        ->leftJoin('status','learner_schedule.status_id','=','status.status_id')
//        ->leftJoin('learner_schedule_time','learner_schedule.learner_schedule_id','=','learner_schedule_time.learner_schedule_id')
//        ->leftJoin('day','learner_schedule_time.day_id','=','day.day_id')
//        ->leftJoin('duration','learner_schedule_time.duration_id','=','duration.duration_id')
//        ->where('user_id_request', Auth::user()->user_id)
//        ->whereIn('learner_schedule.status_id', [2])
//        ->paginate(10);

        $learnerSchedule = DB::select('select * from learner_schedule ls , learner_schedule_request lsq , user us , subject s , level l , status st where lsq.learner_schedule_id = ls.learner_schedule_id and ls.subject_id = s.subject_id and ls.level_id = l.level_id and ls.status_id = st.status_id and ls.user_id = us.user_id and (ls.status_id = 2 or ls.status_id = 3) and lsq.tutor_id = ?',[Auth::user()->user_id]);

//        $learnerSchedule = DB::select('select * from learner_schedule ls , learner_schedule_request lsq where lsq.learner_shcedule_id = ls.learner_schedule_id and lsq.tutor_id = ?',[])

        foreach ($learnerSchedule as $ls){
            $learnerScheduleTime = DB::select('select * from learner_schedule_time lst , day d where lst.day_id = d.day_id and learner_schedule_id = ?',[$ls->learner_schedule_id]);
            $ls->learnerScheduleTime = $learnerScheduleTime;
            $ls->approved_tutor = 0;
            if($ls->status_id == 3){
                $agreement = DB::select('select tutor_id from agreement where learner_schedule_id = ?',[$ls->learner_schedule_id]);
                if($agreement[0]->tutor_id == Auth::user()->user_id){
                    $ls->approved_tutor = 1;
                }else{
                    $ls->approved_tutor = 2;
                }
            }
        }



        //Set data to view
        $data = compact('tutorProfile','learnerSchedule');
             
        return view('tutor.TutorStatusRequest',$data);
    }
}
