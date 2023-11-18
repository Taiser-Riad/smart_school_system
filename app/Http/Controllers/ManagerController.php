<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ManagerController extends Controller
{
        //show manager welcome page
        public function welcome()
        {
            return view("managerWelcome");
        }
}
