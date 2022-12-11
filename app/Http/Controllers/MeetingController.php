<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\smeeting;
use Auth;

class MeetingController extends Controller
{
    public function meeting(Request $req){
        return view('dashboard')->with('name', 'meeting');
    }
    public function addmeeting(Request $req){
        return view('dashboard')->with('name', 'addmeeting');
    }
    public function addmeetings(Request $req){
        $meeting = new smeeting;
        $meeting->name = $req->name;
        $meeting->url = $req->url;
        $meeting->content = $req->discr;
        $meeting->user_id = Auth::User()->id;
        $meeting->mdate = $req->date;
        $meeting->fac_id = Auth::User()->fac_id;
        $meeting->dept_id = Auth::User()->dept_id;
        $meeting->save();

        return redirect()->back();
    }
    public function deletemeeting(Request $req){
        $smeeting = smeeting::find($req->id);
        $smeeting->delete();
        return redirect()->back();
    }
}
