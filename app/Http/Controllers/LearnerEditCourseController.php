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

class LearnerEditCourseController extends BaseController
{
   
    public function __construct(){
        
    }

    public function edit($learner_schedule_id) {
        //header
        $learnerProfile = DB::table('user')
        ->select(['img_profile', 'username'])
        ->where('user_id', Auth::user()->user_id)->first();
        
        $subject = DB::table('subject')->orderBy('subject_name','asc')->get();
        $day = DB::table('day')->orderBy('day_id','asc')->get();
        $level = DB::table('level')->orderBy('level_id','asc')->get();
        $duration = DB::table('duration')->orderBy('duration_id','asc')->get();
        
        $learnerSchedule = DB::table('learner_schedule')
        ->where('learner_schedule_id', $learner_schedule_id)->first();

        $learnerScheduleTime = DB::table('learner_schedule_time')
            ->where('learner_schedule_id', $learner_schedule_id)->get();

        $data = compact('subject','day','level','duration', 'learnerProfile', 'learnerSchedule' , 'learnerScheduleTime');
        return view('learner.LearnerEditCourse', $data);
    }

    public function updated(Request $request, $learner_schedule_id) {

        DB::update('update learner_schedule SET status_id = ?
        , subject_id = ?, level_id = ?, user_id = ? , location = ? , price_per_hour = ? WHERE learner_schedule_id = ?',
        [1,$request->get('subject'),$request->get('level'),Auth::user()->user_id,$request->get('location'),$request->get('price_per_hour'),$learner_schedule_id]);
        
        DB::delete('delete from learner_schedule_time WHERE learner_schedule_id = ?', [$learner_schedule_id]);
        
        $result = DB::table('learner_schedule')->where('learner_schedule_id', $learner_schedule_id)->take(1)->get();
        $i = 0;
        foreach($request->get('day') as $day){
            DB::insert('insert into learner_schedule_time (learner_schedule_id,day_id,start_time,end_time) VALUES (?,?,?,?)',[$result[0]->learner_schedule_id,$day,$request->get('start_time')[$i],$request->get('end_time')[$i]]);
            $i++;
        }
        
        return redirect(url('learnercoursestatus'));
    }

    public function delete($learner_schedule_id) {
        DB::delete('delete from learner_schedule_time WHERE learner_schedule_id = ?', [$learner_schedule_id]);

        DB::delete('delete from learner_schedule WHERE learner_schedule_id = ?', [$learner_schedule_id]);
        
        return redirect(url('learnercoursestatus'));
    }

}
// DB::table('learner_schedule_time_id')->where('learner_schedule_id', )->delete();

// // DB::table('learner_schedule')
// ->where('learner_schedule_id', $learner_schedule_id)->first()
// ->update(['subject' => $request->subject]);