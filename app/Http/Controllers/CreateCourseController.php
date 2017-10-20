<?php

namespace App\Http\Controllers;

use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use DB;
use Input;
use Illuminate\Http\Request;

class CreateCourseController extends BaseController
{
   
    public function __construct(){
        $this->middleware('auth');
    }

    public function indexLearner(){

        $learnerProfile = DB::table('user')
            ->select(['img_profile'])
            ->where('user_id', Auth::user()->user_id)->first();
      
        $subject = DB::table('subject')->orderBy('subject_name','asc')->get();
        $day = DB::table('day')->orderBy('day_name','asc')->get();
        $level = DB::table('level')->orderBy('level_name','asc')->get();
        $duration = DB::table('duration')->orderBy('duration_name','asc')->get();
  
        $data = compact('subject','day','level','duration', 'learnerProfile');

        return view('learner.LearnerCreateCourse',$data);
    
    }
    public function indexTutor(){
        
          $subject = DB::table('subject')->orderBy('subject_name','asc')->get();
          $day = DB::table('day')->orderBy('day_name','asc')->get();
          $level = DB::table('level')->orderBy('level_name','asc')->get();
          $duration = DB::table('duration')->orderBy('duration_name','asc')->get();
    
          $data = compact('subject','day','level','duration');
  
          return view('tutor.TutorCreateCourse',$data);
      
      }
    
    public function insertLearner(Request $request){
        
        //$tutor_schedule = new TutorSchedule();
//        $learner_schedule = DB::select('select learner_schedule_id from learner_schedule order by learner_schedule_id desc limit 1');
//                $learner_schedule->learner_id = 1 ;
//                $learner_schedule->status_sch_id = 1 ;
//                $subject = DB::table('subject')->get();
//                $day = DB::table('day')->get();
//                $level = DB::table('level')->get();
//                $duration = DB::table('duration')->get();

//                 $data = array();
//                 $data['day_id'] = $request->get('day');
//                 $data['subject_id'] = $request->get('subject');
//                 $data['level_id'] = $request->get('level');
//                 $data['user_id'] = Auth::user()->user_id;
////                 $data['duration_id'] = $request->get('duration');
//                 $data = DB::table('learner_schedule')->insert($data);

                 DB::insert('insert into learner_schedule (status_id,subject_id,level_id,user_id) VALUES (?,?,?,?)',[1,$request->get('subject'),$request->get('level'),Auth::user()->user_id]);

                 $result = DB::table('learner_schedule')->orderBy('learner_schedule_id','desc')->take(1)->get();
                $i = 0;
                 foreach($request->get('duration') as $duration){
                     DB::insert('insert into learner_schedule_time (learner_schedule_id,day_id,duration_id) VALUES (?,?,?)',[$result[0]->learner_schedule_id,$request->get('day')[$i],$duration]);
                     $i++;
                 }

                 return redirect(url('learnermycourse'));

      }
      public function insertTutor(Request $insert){
        
        //$tutor_schedule = new TutorSchedule();
        // $tutor_schedule = DB::table('tutor_schedule')->get();
                
        //         $tutor_schedule->learner_id = 1 ;
        //         $tutor_schedule->status_sch_id = 1 ;
               


        //         $data = array();
        //         $data['day_id'] = $request->day;
        //         $data['subject_id'] = $request->subject;
        //         $data['level_id'] = $request->level;
        //         $data['duration_id'] = $request->duration;
        //         $data = DB::table('tutor_schedule')->insert($data);
        
               
      
      }
}
