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
        
        $learnerProfile->firstname = $request->firstname;
        $learnerProfile->lastname = $request->lastname;
        $learnerProfile->nickname = $request->nickname;
        $learnerProfile->username = $request->username;
        $learnerProfile->password = Hash::make($request->password);
        $learnerProfile->birthday = $request->birthday;
        $learnerProfile->age = $request->age;
        $learnerProfile->gender = $request->gender;
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
        $learnerProfile->img_profile = $request->img_profile;
        $learnerProfile->img_card = $request->img_card;
        $learnerProfile->card_id = $request->card_id;
        
        $learnerProfile->update();
        return redirect('learnerprofile');
    }

}
