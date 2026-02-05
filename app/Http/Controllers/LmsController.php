<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LmsController extends Controller
{
    public function LMS(){
        return view('lms.index');
    }
}
