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

class LearnerEditProfileController extends BaseController
{
   
    public function __construct(){
        $this->middleware('auth');
    }

    public function edit($user_id) {
        //header
        $learnerProfile = DB::table('user')
        ->where('user_id', Auth::user()->user_id)->first();

        $data = compact('learnerProfile');
        return view('learner.LearnerEditProfile', $data);
    }
 
    public function updated(Request $request, $user_id) {
        $learnerProfile = users::where('user_id', $user_id)->first();

        $time = date('YmdHis');
        
        $file = explode('.',$_FILES['img_card']['name']);
        $file = $time.'.'.end($file);
        $path = public_path('image_card');
        $request->file('img_card')->move($path,$file);

        $file1 = explode('.',$_FILES['img_profile']['name']);
        $file1 = $time.'.'.end($file1);
        $path1 = public_path('image_profile');
        $request->file('img_profile')->move($path1,$file1);

        $learnerProfile->firstname = $request->firstname;
        $learnerProfile->lastname = $request->lastname;
        $learnerProfile->nickname = $request->nickname;
        $learnerProfile->username = $request->username;
        $learnerProfile->birthday = $request->birthday;
        $learnerProfile->age = $request->age;
        $learnerProfile->email = $request->email;
        $learnerProfile->tel = $request->tel;
        $learnerProfile->address = $request->input('address');
        $learnerProfile->experience = $request->experience;
        $learnerProfile->ref_name = $request->ref_name;
        $learnerProfile->ref_relation = $request->ref_relation;
        $learnerProfile->ref_tel = $request->ref_tel;
        $learnerProfile->school = $request->school;
        $learnerProfile->level = $request->level;
        $learnerProfile->grade = $request->grade;
        $learnerProfile->img_profile = 'image_profile/'.$file1;
        $learnerProfile->img_card ='image_card/'.$file;
        $learnerProfile->card_id = $request->card_id;
        
        $learnerProfile->update();
        return redirect('learnerprofile');
    }

}
