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
           $agreement_id = DB::table('agreement')->insertGetId($data,'agreement_id');
           $data = array();
           $data['agreement_id'] = $agreement_id;
           $data['price'] = $request->price;
           $data['detail_transport'] = $request->detail_transport;
           $data['detail_location'] = $request->detail_location;
           $data['detail_lesson'] = $request->detail_lesson;
           $data['user_id_request'] = 1;
           DB::table('agreement')->insert($data);

           $data = array();
           $frequency_id = DB::table('frequency')->insertGetId($data,'frequency_id');
           $data = array();
           $data['frequency_id'] = $frequency_id;
           $data['study_day'] = $request->study_day;
           $data['start_time'] = $request->start_time;
           $data['end_time'] = $request->end_time; 
           $data['agreement_id'] = $agreement_id;
           DB::table('frequency')->insert($data);

           
           DB::table('agreement')->insert($data);
           
        }
        // elseif($request->accept == 'no'){

        // }
        
}

