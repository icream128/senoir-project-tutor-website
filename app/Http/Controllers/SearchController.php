<?php


namespace App\Http\Controllers;
use Illuminate\Http\Request;


use DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\File;


class SearchController extends BaseController
{
    public function __construct(){
        
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
              ->leftJoin('subject', 'learner_schedule.subjects_id', '=', 'subject.subjects_id')
              ->leftJoin('levels', 'learner_schedule.levels_id', '=', 'levels.levels_id')
              ->leftJoin('duration', 'learner_schedule.duration_id', '=', 'duration.duration_id')
              ->leftJoin('day', 'learner_schedule.day_id', '=', 'day.day_id')
              ->whereIn('learner_schedule.subjects_id', array_unique($subject_tags))
              ->whereIn('learner_schedule.levels_id', array_unique($level_tags))
              ->whereIn('learner_schedule.duration_id', array_unique($duration_tags))
              ->whereIn('learner_schedule.day_id', array_unique($day_tags))
              ->get();
        
            }else if($chkvalue[0] == 1 && $chkvalue[1] == 1 && $chkvalue[2] == 1 && $chkvalue[3] == 0){ //14 = 1110
        
              $queries = DB::table('learner_schedule')
              ->leftJoin('subject', 'learner_schedule.subjects_id', '=', 'subject.subjects_id')
              ->leftJoin('levels', 'learner_schedule.levels_id', '=', 'levels.levels_id')
              ->leftJoin('duration', 'learner_schedule.duration_id', '=', 'duration.duration_id')
              ->leftJoin('day', 'learner_schedule.day_id', '=', 'day.day_id')
              ->whereIn('learner_schedule.subjects_id', array_unique($subject_tags))
              ->whereIn('learner_schedule.levels_id', array_unique($level_tags))
              ->whereIn('learner_schedule.duration_id', array_unique($duration_tags))
              ->get();
        
            }else if($chkvalue[0] == 1 && $chkvalue[1] == 1 && $chkvalue[2] == 0 && $chkvalue[3] == 1){ //13 = 1101
        
              $queries = DB::table('learner_schedule')
              ->leftJoin('subject', 'learner_schedule.subjects_id', '=', 'subject.subjects_id')
              ->leftJoin('levels', 'learner_schedule.levels_id', '=', 'levels.levels_id')
              ->leftJoin('duration', 'learner_schedule.duration_id', '=', 'duration.duration_id')
              ->leftJoin('day', 'learner_schedule.day_id', '=', 'day.day_id')
              ->whereIn('learner_schedule.subjects_id', array_unique($subject_tags))
              ->whereIn('learner_schedule.levels_id', array_unique($level_tags))
              ->whereIn('learner_schedule.day_id', array_unique($day_tags))
              ->get();
        
            }else if($chkvalue[0] == 1 && $chkvalue[1] == 1 && $chkvalue[2] == 0 && $chkvalue[3] == 0){ //12 = 1100
        
              $queries = DB::table('learner_schedule')
              ->leftJoin('subject', 'learner_schedule.subjects_id', '=', 'subject.subjects_id')
              ->leftJoin('levels', 'learner_schedule.levels_id', '=', 'levels.levels_id')
              ->leftJoin('duration', 'learner_schedule.duration_id', '=', 'duration.duration_id')
              ->leftJoin('day', 'learner_schedule.day_id', '=', 'day.day_id')
              ->whereIn('learner_schedule.subjects_id', array_unique($subject_tags))
              ->whereIn('learner_schedule.levels_id', array_unique($level_tags))
              ->get();
        
            }else if($chkvalue[0] == 1 && $chkvalue[1] == 0 && $chkvalue[2] == 1 && $chkvalue[3] == 1){ //11 = 1011
        
              $queries = DB::table('learner_schedule')
              ->leftJoin('subject', 'learner_schedule.subjects_id', '=', 'subject.subjects_id')
              ->leftJoin('levels', 'learner_schedule.levels_id', '=', 'levels.levels_id')
              ->leftJoin('duration', 'learner_schedule.duration_id', '=', 'duration.duration_id')
              ->leftJoin('day', 'learner_schedule.day_id', '=', 'day.day_id')
              ->whereIn('learner_schedule.subjects_id', array_unique($subject_tags))
              ->whereIn('learner_schedule.duration_id', array_unique($duration_tags))
              ->whereIn('learner_schedule.day_id', array_unique($day_tags))
              ->get();
        
            }else if($chkvalue[0] == 1 && $chkvalue[1] == 0 && $chkvalue[2] == 1 && $chkvalue[3] == 0){ //10 = 1010
        
              $queries = DB::table('learner_schedule')
              ->leftJoin('subject', 'learner_schedule.subjects_id', '=', 'subject.subjects_id')
              ->leftJoin('levels', 'learner_schedule.levels_id', '=', 'levels.levels_id')
              ->leftJoin('duration', 'learner_schedule.duration_id', '=', 'duration.duration_id')
              ->leftJoin('day', 'learner_schedule.day_id', '=', 'day.day_id')
              ->whereIn('learner_schedule.subjects_id', array_unique($subject_tags))
              ->whereIn('learner_schedule.duration_id', array_unique($duration_tags))
              ->get();
        
            }else if($chkvalue[0] == 1 && $chkvalue[1] == 0 && $chkvalue[2] == 0 && $chkvalue[3] == 1){ //9 = 1001
        
              $queries = DB::table('learner_schedule')
              ->leftJoin('subject', 'learner_schedule.subjects_id', '=', 'subject.subjects_id')
              ->leftJoin('levels', 'learner_schedule.levels_id', '=', 'levels.levels_id')
              ->leftJoin('duration', 'learner_schedule.duration_id', '=', 'duration.duration_id')
              ->leftJoin('day', 'learner_schedule.day_id', '=', 'day.day_id')
              ->whereIn('learner_schedule.subjects_id', array_unique($subject_tags))
              ->whereIn('learner_schedule.day_id', array_unique($day_tags))
              ->get();
        
            }else if($chkvalue[0] == 1 && $chkvalue[1] == 0 && $chkvalue[2] == 0 && $chkvalue[3] == 0){ //8 = 1000
        
              $queries = DB::table('learner_schedule')
              ->leftJoin('subject', 'learner_schedule.subjects_id', '=', 'subject.subjects_id')
              ->leftJoin('levels', 'learner_schedule.levels_id', '=', 'levels.levels_id')
              ->leftJoin('duration', 'learner_schedule.duration_id', '=', 'duration.duration_id')
              ->leftJoin('day', 'learner_schedule.day_id', '=', 'day.day_id')
              ->whereIn('learner_schedule.subjects_id', array_unique($subject_tags))
              ->get();
        
            }else if($chkvalue[0] == 1 && $chkvalue[1] == 1 && $chkvalue[2] == 1 && $chkvalue[3] == 1){ //7 = 0111
        
              $queries = DB::table('learner_schedule')
              ->leftJoin('subject', 'learner_schedule.subjects_id', '=', 'subject.subjects_id')
              ->leftJoin('levels', 'learner_schedule.levels_id', '=', 'levels.levels_id')
              ->leftJoin('duration', 'learner_schedule.duration_id', '=', 'duration.duration_id')
              ->leftJoin('day', 'learner_schedule.day_id', '=', 'day.day_id')
              ->whereIn('learner_schedule.levels_id', array_unique($level_tags))
              ->whereIn('learner_schedule.duration_id', array_unique($duration_tags))
              ->whereIn('learner_schedule.day_id', array_unique($day_tags))
              ->get();
        
            }else if($chkvalue[0] == 1 && $chkvalue[1] == 1 && $chkvalue[2] == 1 && $chkvalue[3] == 0){ //6 = 0110
        
              $queries = DB::table('learner_schedule')
              ->leftJoin('subject', 'learner_schedule.subjects_id', '=', 'subject.subjects_id')
              ->leftJoin('levels', 'learner_schedule.levels_id', '=', 'levels.levels_id')
              ->leftJoin('duration', 'learner_schedule.duration_id', '=', 'duration.duration_id')
              ->leftJoin('day', 'learner_schedule.day_id', '=', 'day.day_id')
              ->whereIn('learner_schedule.levels_id', array_unique($level_tags))
              ->whereIn('learner_schedule.duration_id', array_unique($duration_tags))
              ->get();
        
            }else if($chkvalue[0] == 0 && $chkvalue[1] == 1 && $chkvalue[2] == 0 && $chkvalue[3] == 1){ //5 = 0101
        
              $queries = DB::table('learner_schedule')
              ->leftJoin('subject', 'learner_schedule.subjects_id', '=', 'subject.subjects_id')
              ->leftJoin('levels', 'learner_schedule.levels_id', '=', 'levels.levels_id')
              ->leftJoin('duration', 'learner_schedule.duration_id', '=', 'duration.duration_id')
              ->leftJoin('day', 'learner_schedule.day_id', '=', 'day.day_id')
              ->whereIn('learner_schedule.levels_id', array_unique($level_tags))
              ->whereIn('learner_schedule.day_id', array_unique($day_tags))
              ->get();
        
            }else if($chkvalue[0] == 0 && $chkvalue[1] == 1 && $chkvalue[2] == 0 && $chkvalue[3] == 0){ //4 = 0100
        
              $queries = DB::table('learner_schedule')
              ->leftJoin('subject', 'learner_schedule.subjects_id', '=', 'subject.subjects_id')
              ->leftJoin('levels', 'learner_schedule.levels_id', '=', 'levels.levels_id')
              ->leftJoin('duration', 'learner_schedule.duration_id', '=', 'duration.duration_id')
              ->leftJoin('day', 'learner_schedule.day_id', '=', 'day.day_id')
              ->whereIn('learner_schedule.levels_id', array_unique($level_tags))
              ->get();
        
            }else if($chkvalue[0] == 0 && $chkvalue[1] == 0 && $chkvalue[2] == 1 && $chkvalue[3] == 1){ //3 = 0011
        
              $queries = DB::table('learner_schedule')
              ->leftJoin('subject', 'learner_schedule.subjects_id', '=', 'subject.subjects_id')
              ->leftJoin('levels', 'learner_schedule.levels_id', '=', 'levels.levels_id')
              ->leftJoin('duration', 'learner_schedule.duration_id', '=', 'duration.duration_id')
              ->leftJoin('day', 'learner_schedule.day_id', '=', 'day.day_id')
              ->whereIn('learner_schedule.duration_id', array_unique($duration_tags))
              ->whereIn('learner_schedule.day_id', array_unique($day_tags))
              ->get();
        
            }else if($chkvalue[0] == 0 && $chkvalue[1] == 0 && $chkvalue[2] == 1 && $chkvalue[3] == 0){ //2 = 0010
        
              $queries = DB::table('learner_schedule')
              ->leftJoin('subject', 'learner_schedule.subjects_id', '=', 'subject.subjects_id')
              ->leftJoin('levels', 'learner_schedule.levels_id', '=', 'levels.levels_id')
              ->leftJoin('duration', 'learner_schedule.duration_id', '=', 'duration.duration_id')
              ->leftJoin('day', 'learner_schedule.day_id', '=', 'day.day_id')
              ->whereIn('learner_schedule.duration_id', array_unique($duration_tags))
              ->get();
        
            }else if($chkvalue[0] == 0 && $chkvalue[1] == 0 && $chkvalue[2] == 0 && $chkvalue[3] == 1){ //1 = 0001
        
              $queries = DB::table('learner_schedule')
              ->leftJoin('subject', 'learner_schedule.subjects_id', '=', 'subject.subjects_id')
              ->leftJoin('levels', 'learner_schedule.levels_id', '=', 'levels.levels_id')
              ->leftJoin('duration', 'learner_schedule.duration_id', '=', 'duration.duration_id')
              ->leftJoin('day', 'learner_schedule.day_id', '=', 'day.day_id')
              ->whereIn('learner_schedule.day_id', array_unique($day_tags))
              ->get();
        
            }if($chkvalue[0] == 0 && $chkvalue[1] == 0 && $chkvalue[2] == 0 && $chkvalue[3] == 0){ //0 = 0000
        
              $queries = DB::table('learner_schedule')
              ->leftJoin('subject', 'learner_schedule.subjects_id', '=', 'subject.subjects_id')
              ->leftJoin('levels', 'learner_schedule.levels_id', '=', 'levels.levels_id')
              ->leftJoin('duration', 'learner_schedule.duration_id', '=', 'duration.duration_id')
              ->leftJoin('day', 'learner_schedule.day_id', '=', 'day.day_id')
              ->get();
        
            }
        
        
            foreach ($queries as $query) {
              # code...
              $results[] = [ 'learner_schedule_id' => $query->learner_schedule_id , 'subjects_id' => $query->subjects_id ,'subject_name' => $query->subject_name , 'levels_id' => $query->levels_id , 'level_name' => $query->level_name , 'duration_id' => $query->duration_id , 'duration_name' => $query->duration_name , 'day_id' => $query->day_id , 'dayfull' => $query->dayfull ] ;
        
            }
        
        
            // return Response::json($results, 200, [],JSON_UNESCAPED_UNICODE);
        
            File::put('jsonfile/filterdata.json',json_encode($results,JSON_UNESCAPED_UNICODE));
            return response()->file("jsonfile/filterdata.json");
        
          }
}
