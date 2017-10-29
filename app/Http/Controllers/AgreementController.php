<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AgreementController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
        $this->middleware('learner');
    }


}
