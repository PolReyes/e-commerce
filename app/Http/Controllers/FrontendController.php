<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontendController extends Controller
{
    //
    public function getIndex(){
        return view("frontend.home.index");
    }
}
