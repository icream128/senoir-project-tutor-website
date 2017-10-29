<?php

/**
 * Created by PhpStorm.
 * User: sp
 * Date: 10/19/2017 AD
 * Time: 22:43
 */
Class Helper{
    public static function redirectByRole($userRoleId){

        if($userRoleId == 1){
            return redirect('/firstpage');
        }elseif ($userRoleId == 2){
            return redirect()->route('tutorhome');
        }

    }
}