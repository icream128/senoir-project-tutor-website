<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use DB;
use Datatables;
use Illuminate\Http\Request;

class RegisterController extends BaseController
{
    public function __construct(){
        
    }
    
        public function save(Request $request){
           
            // $data = array();
       
            // $user_id = DB::table('user')->insertGetId($data,'user_id');
            
            $data = array();
            $data['username'] = $request->username;
            $data['password'] = $request->password;
            // $data['user_id'] = $user_id;
            $time = date('YmdHis');
            
            $file = explode('.',$_FILES['img_card']['name']);
            $file = $time.'.'.end($file);
            $path = public_path('image_card');
            $request->file('img_card')->move($path,$file);
    
            $file1 = explode('.',$_FILES['img_profile']['name']);
            $file1 = $time.'.'.end($file1);
            $path1 = public_path('image_profile');
            $request->file('img_profile')->move($path1,$file1);
       
            $data['email'] = $request->email;  
            $data['firstname'] = $request->firstname;
            $data['lastname'] = $request->lastname;
            $data['nickname'] = $request->nickname; 
            $data['birthday'] = $request->birthday;
            $data['card_id'] = $request->card_id;
            $data['gender'] = $request->gender;
            $data['age'] = $request->age;
            $data['img_card'] = 'image_card/'.$file;
            $data['img_profile'] = 'image_profile/'.$file1;
           // $bdate = explode('/', $request->birthday);
            $data['tel'] = $request->tel;
            $data['address'] = $request->address;
            $data['ref_name'] = $request->ref_name;
            $data['ref_relation'] = $request->ref_relation;
            $data['ref_tel'] = $request->ref_tel;
            $data['school'] = $request->school;
            $data['level'] = $request->level;
            $data['grade'] = $request->grade;
            $data['experience'] = $request->experience;
            $data['status_user_id'] = 1;
            // DB::table('user')->insert($data);
            if($request->role == '1'){//learner
                
                $data['role_id'] = $request->role;
                // $user_id = DB::table('user')->insertGetId($data,'user_id');
                  
            }
            elseif($request->role == '2'){//tutor
              
                $data['role_id'] = $request->role;
                // $user_id = DB::table('user')->insertGetId($data,'user_id');
                
            }
            DB::table('user')->insert($data);
        }
}
