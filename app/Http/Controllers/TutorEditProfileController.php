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

class TutorEditProfileController extends BaseController
{
   
    public function __construct(){
        
    }

    public function edit($user_id) {
        //header
        $tutorProfile = DB::table('user')
        ->where('user_id', Auth::user()->user_id)->first();

        $data = compact('tutorProfile');
        return view('tutor.TutorEditProfile', $data);
    }
 
    public function updated(Request $request, $user_id) {
        $tutorProfile = users::where('user_id', $user_id)->first();
        
        $tutorProfile->firstname = $request->firstname;
        $tutorProfile->lastname = $request->lastname;
        $tutorProfile->nickname = $request->nickname;
        $tutorProfile->username = $request->username;
        $tutorProfile->password = Hash::make($request->password);
        $tutorProfile->birthday = $request->birthday;
        $tutorProfile->age = $request->age;
        $tutorProfile->gender = $request->gender;
        $tutorProfile->email = $request->email;
        $tutorProfile->tel = $request->tel;
        $tutorProfile->address = $request->input('address');
        $tutorProfile->experience = $request->experience;
        $tutorProfile->ref_name = $request->ref_name;
        $tutorProfile->ref_relation = $request->ref_relation;
        $tutorProfile->ref_tel = $request->ref_tel;
        $tutorProfile->school = $request->school;
        $tutorProfile->level = $request->level;
        $tutorProfile->grade = $request->grade;
        $tutorProfile->img_profile = $request->img_profile;
        $tutorProfile->img_card = $request->img_card;
        $tutorProfile->card_id = $request->card_id;
        
        $tutorProfile->update();
        return redirect('tutorprofile');
    }

}
