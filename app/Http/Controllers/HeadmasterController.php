<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HeadmasterController extends Controller
{
        //show head-master welcome page
        public function welcome()
        {
            return view("headmasterWelcome");
        }
}
