<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ActivityController extends Controller
{
    public function activitylog(Request $req){
        return view('dashboard')->with('name', 'activitylog');
    }
}
