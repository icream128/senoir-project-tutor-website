<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\File;

class SearchController extends Controller
{
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */


  public function showdetail(Request $request){
    
        $detail_id = $request->input('id');
    
        $queries = DB::table('learner_schedule')
        ->join('user', 'learner_schedule.user_id', '=', 'user.user_id')
        ->where('learner_schedule_id', $detail_id)
        ->get();

        $results = array();

        foreach ($queries as $query) {

        $results[] = [ 'learner_schedule_id' => $query->learner_schedule_id,'firstname' => $query->firstname ,'lastname' => $query->lastname , 'nickname' => $query->nickname , 'age' => $query->age , 'gender' => $query->gender , 'tel' => $query->tel , 'school' => $query->school , 'level' => $query->level, 'grade' => $query->grade,'ref_name' => $query->ref_name, 'ref_relation' => $query->ref_relation, 'ref_tel' => $query->ref_tel ];
        
        }
      
        
        
        File::put('jsonfile/detail.json',json_encode($results,JSON_UNESCAPED_UNICODE));
        return response()->file("jsonfile/detail.json");
    
  }

  public function liveshow(Request $request){

    $results = array();
    $chkvalue = array(0, 0, 0, 0);

    $subject_tags = $request->input('subject_id');
    $level_tags = $request->input('level_id');
    $duration_tags = $request->input('duration_id');
    $day_tags = $request->input('day_id');

    if(count($subject_tags)>0){
      $chkvalue[0] = 1 ;
    }
    if(count($level_tags)>0){
      $chkvalue[1] = 1 ;
    }
    if(count($duration_tags)>0){
      $chkvalue[2] = 1 ;
    }
    if(count($day_tags)>0){
      $chkvalue[3] = 1 ;
    }


    if($chkvalue[0] == 1 && $chkvalue[1] == 1 && $chkvalue[2] == 1 && $chkvalue[3] == 1){ //15 = 1111

      $queries = DB::table('learner_schedule')
      ->leftJoin('user','learner_schedule.user_id','=','user.user_id')
      ->leftJoin('subject','learner_schedule.subject_id','=','subject.subject_id')
      
      ->leftJoin('level','learner_schedule.level_id','=','level.level_id')
      ->leftJoin('status','learner_schedule.status_id','=','status.status_id')
      ->leftJoin('learner_schedule_time','learner_schedule.learner_schedule_id','=','learner_schedule_time.learner_schedule_id')
      ->leftJoin('day','learner_schedule_time.day_id','=','day.day_id')
      ->leftJoin('duration','learner_schedule_time.duration_id','=','duration.duration_id')
      ->whereIn('learner_schedule.status_id', [1, 8])
      ->whereIn('learner_schedule.subject_id', array_unique($subject_tags))
      ->whereIn('learner_schedule.level_id', array_unique($level_tags))
      ->whereIn('learner_schedule_time.duration_id', array_unique($duration_tags))
      ->whereIn('learner_schedule_time.day_id', array_unique($day_tags))
      ->paginate(10)
      ->get();

    }else if($chkvalue[0] == 1 && $chkvalue[1] == 1 && $chkvalue[2] == 1 && $chkvalue[3] == 0){ //14 = 1110

      $queries = DB::table('learner_schedule')
      ->leftJoin('user','learner_schedule.user_id','=','user.user_id')
      ->leftJoin('subject','learner_schedule.subject_id','=','subject.subject_id')
      
      ->leftJoin('level','learner_schedule.level_id','=','level.level_id')
      ->leftJoin('status','learner_schedule.status_id','=','status.status_id')
      ->leftJoin('learner_schedule_time','learner_schedule.learner_schedule_id','=','learner_schedule_time.learner_schedule_id')
      ->leftJoin('day','learner_schedule_time.day_id','=','day.day_id')
      ->leftJoin('duration','learner_schedule_time.duration_id','=','duration.duration_id')
      ->whereIn('learner_schedule.status_id', [1, 8])
      ->whereIn('learner_schedule.subject_id', array_unique($subject_tags))
      ->whereIn('learner_schedule.level_id', array_unique($level_tags))
      ->whereIn('learner_schedule_time.duration_id', array_unique($duration_tags))
      ->get();

    }else if($chkvalue[0] == 1 && $chkvalue[1] == 1 && $chkvalue[2] == 0 && $chkvalue[3] == 1){ //13 = 1101

      $queries = DB::table('learner_schedule')
      ->leftJoin('user','learner_schedule.user_id','=','user.user_id')
      ->leftJoin('subject','learner_schedule.subject_id','=','subject.subject_id')
      
      ->leftJoin('level','learner_schedule.level_id','=','level.level_id')
      ->leftJoin('status','learner_schedule.status_id','=','status.status_id')
      ->leftJoin('learner_schedule_time','learner_schedule.learner_schedule_id','=','learner_schedule_time.learner_schedule_id')
      ->leftJoin('day','learner_schedule_time.day_id','=','day.day_id')
      ->leftJoin('duration','learner_schedule_time.duration_id','=','duration.duration_id')
      ->whereIn('learner_schedule.status_id', [1, 8])
      ->whereIn('learner_schedule.subject_id', array_unique($subject_tags))
      ->whereIn('learner_schedule.level_id', array_unique($level_tags))
      ->whereIn('learner_schedule_time.day_id', array_unique($day_tags))
      ->get();

    }else if($chkvalue[0] == 1 && $chkvalue[1] == 1 && $chkvalue[2] == 0 && $chkvalue[3] == 0){ //12 = 1100

      $queries = DB::table('learner_schedule')
      ->leftJoin('user','learner_schedule.user_id','=','user.user_id')
      ->leftJoin('subject','learner_schedule.subject_id','=','subject.subject_id')
      
      ->leftJoin('level','learner_schedule.level_id','=','level.level_id')
      ->leftJoin('status','learner_schedule.status_id','=','status.status_id')
      ->leftJoin('learner_schedule_time','learner_schedule.learner_schedule_id','=','learner_schedule_time.learner_schedule_id')
      ->leftJoin('day','learner_schedule_time.day_id','=','day.day_id')
      ->leftJoin('duration','learner_schedule_time.duration_id','=','duration.duration_id')
      ->whereIn('learner_schedule.status_id', [1, 8])
      ->whereIn('learner_schedule.subject_id', array_unique($subject_tags))
      ->whereIn('learner_schedule.level_id', array_unique($level_tags))
      ->get();

    }else if($chkvalue[0] == 1 && $chkvalue[1] == 0 && $chkvalue[2] == 1 && $chkvalue[3] == 1){ //11 = 1011

      $queries = DB::table('learner_schedule')
      ->leftJoin('user','learner_schedule.user_id','=','user.user_id')
      ->leftJoin('subject','learner_schedule.subject_id','=','subject.subject_id')
      
      ->leftJoin('level','learner_schedule.level_id','=','level.level_id')
      ->leftJoin('status','learner_schedule.status_id','=','status.status_id')
      ->leftJoin('learner_schedule_time','learner_schedule.learner_schedule_id','=','learner_schedule_time.learner_schedule_id')
      ->leftJoin('day','learner_schedule_time.day_id','=','day.day_id')
      ->leftJoin('duration','learner_schedule_time.duration_id','=','duration.duration_id')
      ->whereIn('learner_schedule.status_id', [1, 8])
      ->whereIn('learner_schedule.subject_id', array_unique($subject_tags))
      ->whereIn('learner_schedule_time.duration_id', array_unique($duration_tags))
      ->whereIn('learner_schedule_time.day_id', array_unique($day_tags))
      ->get();

    }else if($chkvalue[0] == 1 && $chkvalue[1] == 0 && $chkvalue[2] == 1 && $chkvalue[3] == 0){ //10 = 1010

      $queries = DB::table('learner_schedule')
      ->leftJoin('user','learner_schedule.user_id','=','user.user_id')
      ->leftJoin('subject','learner_schedule.subject_id','=','subject.subject_id')
      
      ->leftJoin('level','learner_schedule.level_id','=','level.level_id')
      ->leftJoin('status','learner_schedule.status_id','=','status.status_id')
      ->leftJoin('learner_schedule_time','learner_schedule.learner_schedule_id','=','learner_schedule_time.learner_schedule_id')
      ->leftJoin('day','learner_schedule_time.day_id','=','day.day_id')
      ->leftJoin('duration','learner_schedule_time.duration_id','=','duration.duration_id')
      ->whereIn('learner_schedule.status_id', [1, 8])
      ->whereIn('learner_schedule.subject_id', array_unique($subject_tags))
      ->whereIn('learner_schedule_time.duration_id', array_unique($duration_tags))
      ->get();

    }else if($chkvalue[0] == 1 && $chkvalue[1] == 0 && $chkvalue[2] == 0 && $chkvalue[3] == 1){ //9 = 1001

      $queries = DB::table('learner_schedule')
      ->leftJoin('user','learner_schedule.user_id','=','user.user_id')
      ->leftJoin('subject','learner_schedule.subject_id','=','subject.subject_id')
      
      ->leftJoin('level','learner_schedule.level_id','=','level.level_id')
      ->leftJoin('status','learner_schedule.status_id','=','status.status_id')
      ->leftJoin('learner_schedule_time','learner_schedule.learner_schedule_id','=','learner_schedule_time.learner_schedule_id')
      ->leftJoin('day','learner_schedule_time.day_id','=','day.day_id')
      ->leftJoin('duration','learner_schedule_time.duration_id','=','duration.duration_id')
      ->whereIn('learner_schedule.status_id', [1, 8])
      ->whereIn('learner_schedule.subject_id', array_unique($subject_tags))
      ->whereIn('learner_schedule_time.day_id', array_unique($day_tags))
      ->get();

    }else if($chkvalue[0] == 1 && $chkvalue[1] == 0 && $chkvalue[2] == 0 && $chkvalue[3] == 0){ //8 = 1000

      $queries = DB::table('learner_schedule')
      ->leftJoin('user','learner_schedule.user_id','=','user.user_id')
      ->leftJoin('subject','learner_schedule.subject_id','=','subject.subject_id')
      
      ->leftJoin('level','learner_schedule.level_id','=','level.level_id')
      ->leftJoin('status','learner_schedule.status_id','=','status.status_id')
      ->leftJoin('learner_schedule_time','learner_schedule.learner_schedule_id','=','learner_schedule_time.learner_schedule_id')
      ->leftJoin('day','learner_schedule_time.day_id','=','day.day_id')
      ->leftJoin('duration','learner_schedule_time.duration_id','=','duration.duration_id')
      ->whereIn('learner_schedule.status_id', [1, 8])
      ->whereIn('learner_schedule.subject_id', array_unique($subject_tags))
      ->get();

    }else if($chkvalue[0] == 1 && $chkvalue[1] == 1 && $chkvalue[2] == 1 && $chkvalue[3] == 1){ //7 = 0111

      $queries = DB::table('learner_schedule')
      ->leftJoin('user','learner_schedule.user_id','=','user.user_id')
      ->leftJoin('subject','learner_schedule.subject_id','=','subject.subject_id')
      
      ->leftJoin('level','learner_schedule.level_id','=','level.level_id')
      ->leftJoin('status','learner_schedule.status_id','=','status.status_id')
      ->leftJoin('learner_schedule_time','learner_schedule.learner_schedule_id','=','learner_schedule_time.learner_schedule_id')
      ->leftJoin('day','learner_schedule_time.day_id','=','day.day_id')
      ->leftJoin('duration','learner_schedule_time.duration_id','=','duration.duration_id')
      ->whereIn('learner_schedule.status_id', [1, 8])
      ->whereIn('learner_schedule.level_id', array_unique($level_tags))
      ->whereIn('learner_schedule_time.duration_id', array_unique($duration_tags))
      ->whereIn('learner_schedule_time.day_id', array_unique($day_tags))
      ->get();

    }else if($chkvalue[0] == 1 && $chkvalue[1] == 1 && $chkvalue[2] == 1 && $chkvalue[3] == 0){ //6 = 0110

      $queries = DB::table('learner_schedule')
      ->leftJoin('user','learner_schedule.user_id','=','user.user_id')
      ->leftJoin('subject','learner_schedule.subject_id','=','subject.subject_id')
      
      ->leftJoin('level','learner_schedule.level_id','=','level.level_id')
      ->leftJoin('status','learner_schedule.status_id','=','status.status_id')
      ->leftJoin('learner_schedule_time','learner_schedule.learner_schedule_id','=','learner_schedule_time.learner_schedule_id')
      ->leftJoin('day','learner_schedule_time.day_id','=','day.day_id')
      ->leftJoin('duration','learner_schedule_time.duration_id','=','duration.duration_id')
      ->whereIn('learner_schedule.status_id', [1, 8])
      ->whereIn('learner_schedule.level_id', array_unique($level_tags))
      ->whereIn('learner_schedule_time.duration_id', array_unique($duration_tags))
      ->get();

    }else if($chkvalue[0] == 0 && $chkvalue[1] == 1 && $chkvalue[2] == 0 && $chkvalue[3] == 1){ //5 = 0101

      $queries = DB::table('learner_schedule')
      ->leftJoin('user','learner_schedule.user_id','=','user.user_id')
      ->leftJoin('subject','learner_schedule.subject_id','=','subject.subject_id')
      
      ->leftJoin('level','learner_schedule.level_id','=','level.level_id')
      ->leftJoin('status','learner_schedule.status_id','=','status.status_id')
      ->leftJoin('learner_schedule_time','learner_schedule.learner_schedule_id','=','learner_schedule_time.learner_schedule_id')
      ->leftJoin('day','learner_schedule_time.day_id','=','day.day_id')
      ->leftJoin('duration','learner_schedule_time.duration_id','=','duration.duration_id')
      ->whereIn('learner_schedule.status_id', [1, 8])
      ->whereIn('learner_schedule.level_id', array_unique($level_tags))
      ->whereIn('learner_schedule_time.day_id', array_unique($day_tags))
      ->get();

    }else if($chkvalue[0] == 0 && $chkvalue[1] == 1 && $chkvalue[2] == 0 && $chkvalue[3] == 0){ //4 = 0100

      $queries = DB::table('learner_schedule')
      ->leftJoin('user','learner_schedule.user_id','=','user.user_id')
      ->leftJoin('subject','learner_schedule.subject_id','=','subject.subject_id')
      
      ->leftJoin('level','learner_schedule.level_id','=','level.level_id')
      ->leftJoin('status','learner_schedule.status_id','=','status.status_id')
      ->leftJoin('learner_schedule_time','learner_schedule.learner_schedule_id','=','learner_schedule_time.learner_schedule_id')
      ->leftJoin('day','learner_schedule_time.day_id','=','day.day_id')
      ->leftJoin('duration','learner_schedule_time.duration_id','=','duration.duration_id')
      ->whereIn('learner_schedule.status_id', [1, 8])
      ->whereIn('learner_schedule.level_id', array_unique($level_tags))
      ->get();

    }else if($chkvalue[0] == 0 && $chkvalue[1] == 0 && $chkvalue[2] == 1 && $chkvalue[3] == 1){ //3 = 0011

      $queries = DB::table('learner_schedule')
      ->leftJoin('user','learner_schedule.user_id','=','user.user_id')
      ->leftJoin('subject','learner_schedule.subject_id','=','subject.subject_id')
      
      ->leftJoin('level','learner_schedule.level_id','=','level.level_id')
      ->leftJoin('status','learner_schedule.status_id','=','status.status_id')
      ->leftJoin('learner_schedule_time','learner_schedule.learner_schedule_id','=','learner_schedule_time.learner_schedule_id')
      ->leftJoin('day','learner_schedule_time.day_id','=','day.day_id')
      ->leftJoin('duration','learner_schedule_time.duration_id','=','duration.duration_id')
      ->whereIn('learner_schedule.status_id', [1, 8])
      ->whereIn('learner_schedule_time.duration_id', array_unique($duration_tags))
      ->whereIn('learner_schedule_time.day_id', array_unique($day_tags))
      ->get();

    }else if($chkvalue[0] == 0 && $chkvalue[1] == 0 && $chkvalue[2] == 1 && $chkvalue[3] == 0){ //2 = 0010

      $queries = DB::table('learner_schedule')
      ->leftJoin('user','learner_schedule.user_id','=','user.user_id')
      ->leftJoin('subject','learner_schedule.subject_id','=','subject.subject_id')
      
      ->leftJoin('level','learner_schedule.level_id','=','level.level_id')
      ->leftJoin('status','learner_schedule.status_id','=','status.status_id')
      ->leftJoin('learner_schedule_time','learner_schedule.learner_schedule_id','=','learner_schedule_time.learner_schedule_id')
      ->leftJoin('day','learner_schedule_time.day_id','=','day.day_id')
      ->leftJoin('duration','learner_schedule_time.duration_id','=','duration.duration_id')
      ->whereIn('learner_schedule.status_id', [1, 8])
      ->whereIn('learner_schedule_time.duration_id', array_unique($duration_tags))
      ->get();

    }else if($chkvalue[0] == 0 && $chkvalue[1] == 0 && $chkvalue[2] == 0 && $chkvalue[3] == 1){ //1 = 0001

      $queries = DB::table('learner_schedule')
      ->leftJoin('user','learner_schedule.user_id','=','user.user_id')
      ->leftJoin('subject','learner_schedule.subject_id','=','subject.subject_id')
      
      ->leftJoin('level','learner_schedule.level_id','=','level.level_id')
      ->leftJoin('status','learner_schedule.status_id','=','status.status_id')
      ->leftJoin('learner_schedule_time','learner_schedule.learner_schedule_id','=','learner_schedule_time.learner_schedule_id')
      ->leftJoin('day','learner_schedule_time.day_id','=','day.day_id')
      ->leftJoin('duration','learner_schedule_time.duration_id','=','duration.duration_id')
      ->whereIn('learner_schedule.status_id', [1, 8])
      ->whereIn('learner_schedule_time.day_id', array_unique($day_tags))
      ->get();

    }if($chkvalue[0] == 0 && $chkvalue[1] == 0 && $chkvalue[2] == 0 && $chkvalue[3] == 0){ //0 = 0000

      $queries = DB::table('learner_schedule')
      ->leftJoin('user','learner_schedule.user_id','=','user.user_id')
      ->leftJoin('subject','learner_schedule.subject_id','=','subject.subject_id')
      
      ->leftJoin('level','learner_schedule.level_id','=','level.level_id')
      ->leftJoin('status','learner_schedule.status_id','=','status.status_id')
      ->leftJoin('learner_schedule_time','learner_schedule.learner_schedule_id','=','learner_schedule_time.learner_schedule_id')
      ->leftJoin('day','learner_schedule_time.day_id','=','day.day_id')
      ->leftJoin('duration','learner_schedule_time.duration_id','=','duration.duration_id')
      ->whereIn('learner_schedule.status_id', [1, 8])
      ->get();

    }


    foreach ($queries as $query) {
      # code...
      $results[] = [ 'learner_schedule_id' => $query->learner_schedule_id , 'subject_id' => $query->subject_id ,'subject_name' => $query->subject_name , 'level_id' => $query->level_id , 'level_name' => $query->level_name , 'duration_id' => $query->duration_id , 'duration_name' => $query->duration_name , 'day_id' => $query->day_id , 'day_name_full' => $query->day_name ] ;

    }


    // return Response::json($results, 200, [],JSON_UNESCAPED_UNICODE);

    File::put('jsonfile/filterdata.json',json_encode($results,JSON_UNESCAPED_UNICODE));
    return response()->file("jsonfile/filterdata.json");

  }
}
