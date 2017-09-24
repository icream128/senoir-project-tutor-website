<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use DB;
use Datatables;
use Illuminate\Http\Request;

class AddDetailController extends BaseController
{
    public function __construct(){
        
    }
    public function saveDetailLearner(Request $request){
        // if($request->accept == 'yes'){
           $data = array();
           $data['start_day'] = $request->start_day;
           $data['start_time'] = $request->start_time;
           $data['end_time'] = $request->end_time; 
           $data['transport_information'] = $request->transport_information;
           $data['location_information'] = $request->location_information;
           $data['lesson_information'] = $request->lesson_information;
           $data['learner_schedule_id'] = 1;
           $data['learner_id'] = 1;
           $data['duration_id'] = 2;
           $data['subject_id'] = 1;
           $data['level_id'] = 8;
           DB::table('learner_schedule')->insert($data);
           
        }
        // elseif($request->accept == 'no'){

        // }
        
}

