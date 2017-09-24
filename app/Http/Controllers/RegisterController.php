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
    // public function saveTutor(Request $request){
        
    
    //        $data = array();
    //        $data['username'] = $request->username;
    //        $data['email'] = $request->email;  
    //        $data['password'] = md5($request->password);
    //        $data['firstname'] = $request->firstname;
    //        $data['lastname'] = $request->lastname;
    //        $data['nickname'] = $request->nickname; 
    //        $data['birthday'] = $request->birthday;
    //        $data['id_card'] = $request->id_card;
    //        $data['gender'] = $request->gender;
    //        $data['age'] = $request->age;
    //        $data['img_card'] = 'image_card/'.$file;
    //        $data['img_profile'] = 'image_profile/'.$file1;
    //       // $bdate = explode('/', $request->birthday);
    //        $data['tel'] = $request->tel;
    //        $data['address'] = $request->address;
    //        $data['tutor_ref'] = $request->tutor_ref;
    //        $data['ref_relation'] = $request->ref_relation;
    //        $data['ref_tel'] = $request->ref_tel;
    //        $data['tutor_school'] = $request->tutor_school;
    //        $data['tutor_level'] = $request->tutor_level;
    //        $data['tutor_grade'] = $request->tutor_grade;
           
    //        DB::table('tutor')->insert($data);
    //        return $this->theme->scope('home.registersuccess')->render();
    //     }
        public function save(Request $request){
           
            $data = array();
            $data['username'] = $request->username;
            $data['password'] = $request->password;
            $users_id = DB::table('users')->insertGetId($data,'users_id');
            
           
   
            $data = array();
            $data['users_id'] = $users_id;
            $time = date('YmdHis');
            
            $file = explode('.',$_FILES['img_card']['name']);
            $file = $time.'.'.end($file);
            $path = public_path('image_card');
            $request->file('img_card')->move($path,$file);
    
            $file1 = explode('.',$_FILES['img_profile']['name']);
            $file1 = $time.'.'.end($file1);
            $path1 = public_path('image_profile');
            $request->file('img_profile')->move($path1,$file1);
            
            if($request->type == 'tutor'){
              
                $data['tutor_email'] = $request->email;  
                $data['tutor_firstname'] = $request->firstname;
                $data['tutor_lastname'] = $request->lastname;
                $data['tutor_nickname'] = $request->nickname; 
                $data['tutor_birthday'] = $request->birthday;
                $data['tutor_id_card'] = $request->id_card;
                $data['tutor_gender'] = $request->gender;
                $data['tutor_age'] = $request->age;
                $data['tutor_img_card'] = 'image_card/'.$file;
                $data['tutor_img_profile'] = 'image_profile/'.$file1;
               // $bdate = explode('/', $request->birthday);
                $data['tutor_tel'] = $request->tel;
                $data['tutor_address'] = $request->address;
                $data['tutor_reference'] = $request->reference;
                $data['tutor_ref_relation'] = $request->ref_relation;
                $data['tutor_ref_tel'] = $request->ref_tel;
                $data['tutor_school'] = $request->school;
                $data['tutor_level'] = $request->level;
                $data['tutor_grade'] = $request->grade;
                $data['tutor_exp'] = $request->exp;
                $data['tutor_status_id'] = 2;
                DB::table('tutor')->insert($data);
                  
            }
            elseif($request->type == 'learner'){
                
                $data['learner_email'] = $request->email;  
                $data['learner_firstname'] = $request->firstname;
                $data['learner_lastname'] = $request->lastname;
                $data['learner_nickname'] = $request->nickname; 
                $data['learner_birthday'] = $request->birthday;
                $data['learner_gender'] = $request->gender;
                $data['learner_age'] = $request->age;
                $data['learner_img_profile'] = 'image_profile/'.$file;
                $data['learner_img_card'] = 'image_card/'.$file1;
            //    $bdate = explode('/', $request->birthday);
                $data['learner_tel'] = $request->tel;
                $data['learner_address'] = $request->address;
                $data['learner_reference'] = $request->reference;
                $data['learner_id_card'] = $request->id_card;
                $data['learner_ref_relation'] = $request->ref_relation;
                $data['learner_ref_tel'] = $request->ref_tel;
                $data['learner_school'] = $request->school;
                $data['learner_level'] = $request->level;
                $data['learner_grade'] = $request->grade;
                DB::table('learner')->insert($data);
                
                
            }
        }

//dd('ddd');

    //            $time = date('YmdHis');
    //           $file2 = explode('.',$_FILES['img_profile']['name']);
    //           $file2 = $time.'.'.end($file2);
    //           $path2 = public_path('image_profile');
    //           $request->file('img_profile')->move($path2,$file2);

    //           $file3 = explode('.',$_FILES['img_profile']['name']);
    //           $file3 = $time.'.'.end($file3);
    //           $path3 = public_path('image_profile');
    //           $request->file('img_profile')->move($path3,$file3);
      
    //           $data = array();
    //           $data['username'] = $request->username;
    //           $data['email'] = $request->email;  
    //           $data['password'] = md5($request->password);
    //           $data['firstname'] = $request->firstname;
    //           $data['lastname'] = $request->lastname;
    //           $data['nickname'] = $request->nickname; 
    //           $data['birthday'] = $request->birthday;
    //           $data['gender'] = $request->gender;
    //           $data['age'] = $request->age;
            
    //           $data['img_profile'] = 'image_profile/'.$file2;
    //           $data['img_card'] = 'image_card/'.$file3;
    //          // $bdate = explode('/', $request->birthday);
    //           $data['tel'] = $request->tel;
    //           $data['address'] = $request->address;
    //           $data['learner_ref'] = $request->learner_ref;
    //           $data['id_card'] = $request->id_card;
    //           $data['ref_relation'] = $request->ref_relation;
    //           $data['ref_tel'] = $request->ref_tel;
    //           $data['school'] = $request->school;
    //           $data['learner_level'] = $request->learner_level;
    //           $data['grade'] = $request->grade;
              
    //           DB::table('learner')->insert($data);
    //           return view('learner.LearnerRegister',$data);
    //        }
    //    public function indexTutor(){
    //     $subject = DB::table('subject')->get();
    //        $data = compact('subject');
    //           return view('tutor.TutorCreateCourse',$data);
    //    }
    // //    public function indexLearner(){
    // //        $subject = DB::table('subjects') 
    // //        ->get();
    // //        $this->theme->set('subject', $subject);
    // //        return $this->theme->scope('home.register_learner')->render();
    // //    }
}
