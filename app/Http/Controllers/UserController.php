<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\faculty;
use App\department;
use App\audit;
use App\job;
use Carbon\Carbon;
use App\Alluniuser;
use Auth;



class UserController extends Controller
{
    public function login(Request $req){
        $userdata = array(
            'email'     => $req->email,
            'password'  => $req->pwd
        );
        if (Auth::attempt($userdata)) {
            echo 'SUCCESS!';
            if(Auth::User()->desig_id == 5){
                if(Auth::User()->email_verified_at == NULL || Auth::User()->email_verified_at == ""){
                    Auth::logout();
                    return redirect()->back();
                }else{
                    if(Auth::User()->approve == 1){
                        return redirect("/userhome");
                    }else{
                        Auth::logout();
                        return redirect()->back();
                    }
                }
            }else if(Auth::User()->desig_id == 1 || Auth::User()->desig_id == 2 || Auth::User()->desig_id == 6  ){
                if(Auth::User()->email_verified_at == NULL || Auth::User()->email_verified_at == ""){
                    Auth::logout();
                    return redirect()->back();
                }else{
                    if(Auth::User()->approve == 1){
                        return redirect("/userhome");
                    }else{
                        Auth::logout();
                        return redirect()->back();
                    }
                  //  return redirect("/userhome");
                }
            }else{
                return redirect("/userhome");
            }
            
        } else {        
            return redirect()->back();
        }
    }
    public function createusers(Request $req){
        return view('dashboard')->with('name', 'createusers');
    }
    public function addusers(Request $req){
        // if(isset($req->file)){
        //     $fileName = time().'.'.$req->file->extension();  
        //     $path = "uploads/profile/".$req->grade;
        //     $req->file->move(public_path($path), $fileName);
        // }else{
        //     $fileName = '';
        // }

        // $user = new User;
        // $user->name = $req->name;
        // $user->email  = $req->email;
        // $user->password =  Hash::make($req->pwd); 
        // $user->url  = $fileName;
        // $user->dept_id = $req->dept;
        // $user->fac_id = $req->fac;
        // $user->desig_id = $req->desig;
        // $user->save();

        

        // $audit = new audit;
        // $audit->type = "user";
        // $audit->glob_id = $user->id;
        // $audit->status = "add";
        // $audit->user_id = Auth::User()->id;
        // $audit->save();

        // return redirect()->back();

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
    public function allusers(Request $req){
        return view('dashboard')->with('name', 'allusers');
    }
    public static function getFacName($id){
        return faculty::find($id);
    }
    public static function getDeptName($id){
        return department::find($id);
    }

    public function viewuser(Request $req){
        return view('dashboard')->with('name', 'viewuser')->with('userid', $req->id);
    }
    public function deleteuser(Request $req){
        $User = User::find($req->id);
        $User->delete();


        $audit = new audit;
        $audit->type = "user";
        $audit->glob_id = $req->id;
        $audit->status = "delete";
        $audit->user_id = Auth::User()->id;
        $audit->save();


        return redirect('/allusers');
    }
    public function addwebteam(Request $req){
        $user = new User;
        $user->name = $req->name;
        $user->email  = $req->email;
        $user->password =  Hash::make($req->pwd); 
        $user->dept_id = 0;
        $user->fac_id = 0;
        $user->desig_id = 5;
        $user->save();

        $audit = new audit;
        $audit->type = "user";
        $audit->glob_id = $user->id;
        $audit->status = "add";
        $audit->user_id = Auth::User()->id;
        $audit->save();

        return redirect()->back();
    }
    public static function getUser($id){
        return User::find($id);
    }
    public static function getJobName($id){
        return job::find($id);
    }
    
    public function getsname(Request $req){
        $depid = $req->id;
        
        $response =  faculty::find($depid);
        return response()->json($response);
    }


    public function webapprovel(Request $req){
        return view('dashboard')->with('name', 'webapprovel');
    }

    public function userpprovel(Request $req){
        return view('dashboard')->with('name', 'approveuser');
    }

    
    public function teamapprove(Request $req){
        $user = User::find($req->id);
        $user->update([
            'approve' => 1
        ]);
        $details = [
            'title' => 'User Verification Email',
            'body' => 'Your Account has been approved by the IT Admin ',
        ];
        \Mail::to($user->email)->send(new \App\Mail\SendMail($details));
        return redirect()->back();
    }
    public function teamdisabled(Request $req){
        $user = User::find($req->id);
        $user->update([
            'approve' => 0
        ]);
        $details = [
            'title' => 'User Disable',
            'body' => 'Your Account has been blocked by the IT Admin. Please contact the IT director for the futher issues.',
        ];
        \Mail::to($user->email)->send(new \App\Mail\SendMail($details));
        return redirect()->back();
    }

    public function verifyme(Request $req){
        $user_id = $req->id;
        $user = User::find($user_id);
        $current_date_time = Carbon::now()->toDateTimeString();
        $user->update([
            'email_verified_at' => $current_date_time
        ]);
        return redirect('/');
    }
    public function verifymesp(Request $req){
        $user_id = $req->id;
        $user = User::find($user_id);
        $current_date_time = Carbon::now()->toDateTimeString();
        $user->update([
            'email_verified_at' => $current_date_time,
            'approve' => 1
        ]);
        return redirect('/');
    }
    
    public function updateusers(Request $req){
        $user = User::find($req->id);

        $fileName = Auth::User()->url;
        if(isset($req->file)){
            $fileName = time().'.'.$req->file->extension();  
            $path = "uploads/profile/".$req->grade;
            $req->file->move(public_path($path), $fileName);
        }else{
            $fileName = Auth::User()->url;
        }

        if(Auth::User()->email == $req->email){
            if(Auth::User()->desig_id ==1 ){
                $user->update([
                    'name' => $req->name,
                    'email' => $req->email,
                    'regno' => $req->regno,
                    'url' => $fileName
                ]);
            }else{
                $user->update([
                    'name' => $req->name,
                    'email' => $req->email,
                    'url' => $fileName
                ]);
            } 
        }else{
            $verifyLink = " http://127.0.0.1:8000/verifymesp/".$user->id;

            $details = [
                'title' => 'User Verification Email',
                'body' => 'Your Email Address were changed. you need to verify your new email in here '.$verifyLink,
            ];
            \Mail::to($req->email)->send(new \App\Mail\SendMail($details));
            if(Auth::User()->desig_id ==1 ){
                $user->update([
                    'name' => $req->name,
                    'email' => $req->email,
                    'regno' => $req->regno,
                    'url' => $fileName,
                    'approve' => 0
                ]);
            }else{
                $user->update([
                    'name' => $req->name,
                    'email' => $req->email,
                    'url' => $fileName,
                    'approve' => 0
                ]);
            } 
        }
        
       
        return redirect()->back();
    }

    public function updatepwd(Request $req){
        if(Hash::check($req->opwd, Auth::User()->password)){
            $user = User::find($req->id);
            $user->update([
                'password' => Hash::make($req->npwd)
            ]);
        }
        return redirect()->back();
    }
    public function makewebmember(Request $req){
        $user = User::find($req->id);
        $user->update([
            'desig_id' => 5,
        ]);
        return redirect()->back();
    }
    public function makecomiteemember(Request $req){
        $user = User::find($req->id);
        $user->update([
            'desig_id' => 4,
        ]);
        return redirect()->back();
    }
    public function removedesignationcom(Request $req){
        $user = User::find($req->id);
        $user->update([
            'desig_id' => 6,
        ]);
        return redirect()->back();
    }
    public function removedesignation(Request $req){
        $user = User::find($req->id);
        $user->update([
            'desig_id' => 2,
        ]);
        return redirect()->back();
    }

    public function addoldusers(Request $req){
       
        $file = $req->file;

        $customerArr = $this->csvToArray($file);

        for ($i = 0; $i < count($customerArr); $i ++){
            $uniuser = new Alluniuser;
            $uniuser->name = $customerArr[$i]['Name'];
            $uniuser->email = $customerArr[$i]['Email'];
            $uniuser->regno = $customerArr[$i]['Id'];
            $uniuser->save();
        }

       return redirect()->back();    
    }
    function csvToArray($filename = '', $delimiter = ','){
        if (!file_exists($filename) || !is_readable($filename))
            return false;

        $header = null;
        $data = array();
        if (($handle = fopen($filename, 'r')) !== false)
        {
            while (($row = fgetcsv($handle, 1000, $delimiter)) !== false)
            {
                if (!$header)
                    $header = $row;
                else
                    $data[] = array_combine($header, $row);
            }
            fclose($handle);
        }

        return $data;
    }
    public function downloadSampleCSV(Request $req){
        return response()->download("SampleCSV.csv");
    }
}
