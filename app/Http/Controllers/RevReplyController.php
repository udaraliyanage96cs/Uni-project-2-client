<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\reviewreply;
use App\reviewreplyimage;
use App\review;
use App\User;
use App\audit;
use App\article;
use App\department;
use App\faculty;
use App\job;
use Auth;




class RevReplyController extends Controller
{
    public function replyreview(Request $req){

        $reviewreply = new reviewreply;

        $reviewreply->reply = $req->revcontent;
        $reviewreply->user_id = Auth::User()->id;
        $reviewreply->article_id = $req->aid;
        $reviewreply->review_id = $req->revid;
        $reviewreply->save();

        $audit = new audit;
        $audit->type = "reply";
        $audit->glob_id = $req->aid;
        $audit->status = "add";
        $audit->user_id = Auth::User()->id;
        $audit->save();

        return redirect()->back();
    }
    public static function getReplyies($id){

        return reviewreply::all()->where('review_id',$id);
    }
    public static function getUserNames($id){
        return User::find($id);
    }
    public function deletereply(Request $req){
        $reviewreply = reviewreply::find($req->id);
        $reviewreply->delete();

        $audit = new audit;
        $audit->type = "reply";
        $audit->glob_id = $req->id;
        $audit->status = "delete";
        $audit->user_id = Auth::User()->id;
        $audit->save();

        return redirect()->back();
    }
    public function deletereview(Request $req){
        $review = review::find($req->id);
        $review->delete();

        $audit = new audit;
        $audit->type = "review";
        $audit->glob_id = $req->id;
        $audit->status = "delete";
        $audit->user_id = Auth::User()->id;
        $audit->save();


        return redirect()->back();
    }
    public function statusupdate(Request $req){
        $review = review::where('article_id','=',$req->id);
        $review->update([
            'status' => $req->val
        ]);

        $audit = new audit;
        $audit->type = "article status";
        $audit->glob_id = $req->id;
        $audit->status = "update";
        $audit->user_id = Auth::User()->id;
        $audit->save();


        return redirect()->back();
    }
    public static function getOrgAuthor($id){
        $article =  article::find($id);
        return User::find($article->user_id);

    }
    public static function getDeptName($id){
        $User =  User::find($id);
        return department::find($User->dept_id);
    }
    public static function getFacName($id){
        $User =  User::find($id);
        return faculty::find($User->fac_id);
    }
    public static function getJobName($id){
        $User =  User::find($id);
        return job::find($User->desig_id);
    }
    
}
