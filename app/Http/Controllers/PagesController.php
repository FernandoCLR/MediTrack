<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function welcome(){
        return view('.welcome');
    }
    public function registration(){
        return view('.registration');
    }
    public function dashboard(){
        return view('.meditrackdash');
    }
      public function timeline(){
            return view('.timeline');
        }
}
