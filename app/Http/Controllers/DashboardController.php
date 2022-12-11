<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\faculty;
use App\department;
use App\audit;
use Auth;

class DashboardController extends Controller
{
    public function userhome(Request $req){
        return view('dashboard')->with('name', 'userhome');
    }
    public function newarticles(Request $req){
        return view('dashboard')->with('name', 'newarticles');
    }
    public function addfaculty(Request $req){
        $faculty = new faculty;
        $faculty->name = $req->fname;
        $faculty->save();

        $audit = new audit;
        $audit->type = "faculty";
        $audit->glob_id = $faculty->id;
        $audit->status = "add";
        $audit->user_id = Auth::User()->id;
        $audit->save();

        return redirect()->back();

        

    }

    public function adddepartment(Request $req){
        $department = new department;
        $department->name = $req->dname;
        $department->sname = $req->dsname;
        $department->faculty_id = $req->faculty;
        $department->save();

        $audit = new audit;
        $audit->type = "department";
        $audit->glob_id = $department->id;
        $audit->status = "add";
        $audit->user_id = Auth::User()->id;
        $audit->save();

        return redirect()->back();
    }
    public function subdashboard(Request $req){
        return view('dashboard')->with('name', 'subdashboard');
    }
    public function usersettings(Request $req){
        return view('dashboard')->with('name', 'usersettings');
    }
}
