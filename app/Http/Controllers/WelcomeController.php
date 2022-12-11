<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\faculty;
use App\User;
use App\department;
use App\job;
use App\audit;
use App\Alluniuser;
use Illuminate\Support\Facades\Hash;


class WelcomeController extends Controller
{
    public function index(Request $req){
        return view('welcome')->with('faculty',faculty::all())->with('department',department::all())->with("designation",job::all());
    }
    public function regusers(Request $req){


        $fileName = '';
        if(isset($req->file)){
            $fileName = time().'.'.$req->file->extension();  
            $path = "uploads/profile/".$req->grade;
            $req->file->move(public_path($path), $fileName);
        }else{
            $fileName = '';
        }

        $user = new User;
        $user->name = $req->name;
        $mails = $req->email."@".$req->domain;
        $user->email  = $mails;
        $user->password =  Hash::make($req->pwd); 
        $user->url  = $fileName;
        
        $user->desig_id = $req->desig;

        if($req->desig == 5){
            $user->dept_id = 0;
            $user->fac_id = 0;
            $user->regno  = null;

        }else{
            $user->regno  = $req->regno;
            $user->dept_id = $req->dept;
            $user->fac_id = $req->fac;
        }
        if($req->desig == 1){
            $user->approve = 1;
        }

        if (Alluniuser::where('email', '=', $mails)->count() > 0) {
            
            $Alluniuser =  Alluniuser::where('email', $mails)->get();
            if($req->desig == 1 || $req->desig == 6){
                if(strtolower($Alluniuser[0]->name) == strtolower($req->name) && $Alluniuser[0]->regno == $req->regno){

                    $user->save();
    
                    $audit = new audit;
                    $audit->type = "user";
                    $audit->glob_id = $user->id;
                    $audit->status = "registered";
                    $audit->user_id = $user->id;
                    $audit->save();
                    $details = [
                        'title' => 'Test Email',
                        'body' => "Test Body"
                    ];
                    //\Mail::to($req->email)->send(new \App\Mail\SendVerification());
            
                    $verifyLink = " http://127.0.0.1:8000/verifyme/".$user->id;
            
                    $details = [
                        'title' => 'User Verification Email',
                        'body' => 'Click This Link To Verfy Your Account '.$verifyLink,
                    ];
                    \Mail::to($mails)->send(new \App\Mail\SendMail($details));
            
                    return redirect()->back();
    
    
                }else{
                    echo "Registration Faild, Please Use your correct informations";
                    echo "Here";
                }
            }
            
        }else{
            if($req->desig != 1 && $req->desig != 6){
                $user->save();
    
                $audit = new audit;
                $audit->type = "user";
                $audit->glob_id = $user->id;
                $audit->status = "registered";
                $audit->user_id = $user->id;
                $audit->save();
                $details = [
                    'title' => 'Test Email',
                    'body' => "Test Body"
                ];
                //\Mail::to($req->email)->send(new \App\Mail\SendVerification());
        
                $verifyLink = " http://127.0.0.1:8000/verifyme/".$user->id;
        
                $details = [
                    'title' => 'User Verification Email',
                    'body' => 'Click This Link To Verfy Your Account '.$verifyLink,
                ];
                \Mail::to($mails)->send(new \App\Mail\SendMail($details));
        
                return redirect()->back();
            }
            echo "Registration Faild, Please Use your correct informations";
            echo "There";
        }
       
        

       
    }
    public function getDepartment(Request $req){
        $dept_id = $req->dept_id;
        $item = department::all()->where('faculty_id',$dept_id); 
        return response()->json(['item'=>$item]);
    }
}
