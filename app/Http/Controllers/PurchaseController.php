<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    public function vendor(){
        return view('purchase.vendor');
    }

    public function postbilling(){
        return view('purchase.postbilling');
    }

    public function postvendor(){
        return view('purchase.postvendor');
    }

    public function req(){
        return view('purchase.req');
    }

    public function postreq(){
        return view('purchase.postreq');
    }

    public function dashboard(){
        return view('purchase.dashboard');
    }
}
