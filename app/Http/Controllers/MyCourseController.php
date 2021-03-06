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

class MyCourseController extends BaseController
{
   
    public function __construct(){
        $this->middleware('auth');
        $this->middleware('learner')->only('indexLearner');
    }

    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function indexTutor() {
        
        //header
        $tutorProfile = DB::table('user')
        ->select(['img_profile', 'username'])
        ->where('user_id', Auth::user()->user_id)->first();
    
        //Get data from database
        $subject = DB::table('subject')->orderBy('subject_name','asc')->get();
        $day = DB::table('day')->orderBy('day_name','asc')->get();
        $level = DB::table('level')->orderBy('level_name','asc')->get();
        $duration = DB::table('duration')->orderBy('duration_name','asc')->get();

        $agreement = DB::table('agreement')
        ->select(['user_id_request', 'tutor_id', 'agreement.agreement_id', 'detail_lesson', 'detail_location', 'detail_transport', 'location','start_course','datetime','user_id_request','img_profile', 'firstname', 'lastname', 'subject_name', 'level_name','price', 'status_name', 'user.tel','agreement.learner_schedule_id'])
        ->leftJoin('learner_schedule','agreement.learner_schedule_id','=','learner_schedule.learner_schedule_id')

        ->leftJoin('user','learner_schedule.user_id','=','user.user_id')
        ->leftJoin('subject','learner_schedule.subject_id','=','subject.subject_id')
        ->leftJoin('level','learner_schedule.level_id','=','level.level_id')
        ->leftJoin('status','learner_schedule.status_id','=','status.status_id')
        ->where('tutor_id', Auth::user()->user_id)
        ->whereIn('learner_schedule.status_id', [3, 5])
        ->get();

        foreach ($agreement as $ls){
            $learnerScheduleTime = DB::select('select * from learner_schedule_time lst , day d where lst.day_id = d.day_id and learner_schedule_id = ?',[$ls->learner_schedule_id]);
            $ls->learnerScheduleTime = $learnerScheduleTime;
        }

        foreach ($agreement as $ls){
            $frequency = DB::table('frequency')
            ->select(['create_frequency', 'nextdeal','moredetail','study_date','comment','point','frequency.price', 'agreement_id', 'start_time', 'end_time',])
            ->where('agreement_id', $ls->agreement_id)
            ->get();

            $frequency1 = DB::table('frequency')
            ->select(['frequency_id'])
            ->where('agreement_id', $ls->agreement_id)
            ->count('frequency_id');

           
            $ls->frequency = $frequency;
        
            $ls->countfre = $frequency1;
        }

        //Set data to view
        $data = compact('subject', 'day','level','duration','tutorProfile' ,'agreement', 'agr');
             
        return view('tutor.TutorMyCourse',$data);
    }
            
    public function indexLearner() {
                
        //header
        $learnerProfile = DB::table('user')
        ->select(['img_profile', 'username'])
        ->where('user_id', Auth::user()->user_id)->first();
        
        // $num = 1;
        
        $agreement = DB::table('agreement')
        ->select(['detail_lesson', 'detail_location', 'detail_transport', 'agreement_id', 'detail_lesson', 'user_id_request', 'img_profile','learner_schedule.status_id', 'firstname', 'lastname', 'subject_name','location', 'start_course', 'level_name','price', 'tutor_id', 'status_name', 'user.tel', 'datetime','agreement.learner_schedule_id'])
        ->leftJoin('learner_schedule','agreement.learner_schedule_id','=','learner_schedule.learner_schedule_id')
        ->leftJoin('user','agreement.tutor_id','=','user.user_id')
        ->leftJoin('subject','learner_schedule.subject_id','=','subject.subject_id')
        ->leftJoin('level','learner_schedule.level_id','=','level.level_id')
        ->leftJoin('status','learner_schedule.status_id','=', 'status.status_id')
        
        ->where('agreement.user_id_request', Auth::user()->user_id)
        ->whereIn('learner_schedule.status_id', [3, 5])
        ->get();

        foreach ($agreement as $ls){
            $learnerScheduleTime = DB::select('select * from learner_schedule_time lst	join learner_schedule ls on  lst.learner_schedule_id=ls.learner_schedule_id join day d on lst.day_id = d.day_id where lst.learner_schedule_id = ?',[$ls->learner_schedule_id]);
            $ls->learnerScheduleTime = $learnerScheduleTime;
        }
        // dd($agreement);

        foreach ($agreement as $ls){
            $frequency = DB::table('frequency')
            ->select(['frequency_id', 'create_frequency', 'nextdeal','moredetail','study_date','comment','point','frequency.price', 'agreement_id', 'start_time', 'end_time',])
            ->where('agreement_id', $ls->agreement_id)
            ->get();

            $frequency1 = DB::table('frequency')
            ->select(['frequency_id'])
            ->where('agreement_id', $ls->agreement_id)
            ->count('frequency_id');
           
            $frequency2 = DB::table('frequency')
            ->select(['nextdeal'])
            ->leftJoin('agreement','agreement.agreement_id','=', 'frequency.agreement_id')
            ->where('agreement.learner_schedule_id', $ls->learner_schedule_id)
            ->orderby('nextdeal','desc')
            ->limit(1)
            ->get();
           
           
            
            // $frequency2 = DB::select('select * from agreement a join frequency f on a.agreement_id=f.agreement_id where a.learner_schedule_id = ?',[$ls->learner_schedule_id]);
            //                     orderby(nextdeal) 
            //                      limit (1);

            $ls->frequency = $frequency;

            $ls->countfre = $frequency1;
            $ls->checkDate = $frequency2;
        }
        //Set data to view
        $data = compact('learnerProfile' ,'agreement', 'agr');
                             
        return view('learner.LearnerMyCourse',$data);
    }

    public function send_course_success(Request $rq){
        $update = DB::update('update learner_schedule set status_id = 7 where learner_schedule_id = ?',[$rq->get('learner_schedule_id')]);
        DB::update('update agreement set end_course_date = CURRENT_TIMESTAMP where learner_schedule_id = ?',[$rq->get('learner_schedule_id')]);
        return redirect('/learnermycourse');
    }

    public function send_course_canceled(Request $rq){
        $update = DB::update('update learner_schedule set status_id = 6 where learner_schedule_id = ?',[$rq->get('learner_schedule_id')]);
        DB::update('update agreement set end_course_date = CURRENT_TIMESTAMP where learner_schedule_id = ?',[$rq->get('learner_schedule_id')]);
        return redirect('/learnermycourse');
    }

}
