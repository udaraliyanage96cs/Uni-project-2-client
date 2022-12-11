<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\article;
use App\contimage;
use App\review;
use App\audit;
use App\Articlesetting;
use Auth;
use PDF;



class ArticleController extends Controller
{
    public function addarticle(Request $req){
        $name = $req->name;
        $content = $req->content;
        
        $article = new article;
        $article->name = $name;
        $article->content = $content;
        $article->user_id = Auth::User()->id;
        $article->fac_id = $req->fac;
        $article->dept_id = $req->dept;
        $article->type = $req->type;
        $article->category_id = $req->catid;

        $article->startdate = $req->sdate;
        $article->enddate = $req->edate;
        
        
        $article->save();


        $article_id = $article->id;
        $contimgs = [];
        if(isset($req->file)){
           
            foreach($req->file as $file){
                $name = $file->getClientOriginalName();
                $path = "uploads/images/".$article_id."/";
                $file->move($path, $name);
                $contimgs[] = $name; 
            }
        }
        echo "<br>";
        echo "<br>";
        echo "<br>";
        print_r($contimgs);
        foreach($contimgs as $cimg){
            $contimage = new contimage;
            $contimage->url = $cimg;
            $contimage->article_id = $article_id;
            $contimage->save();
        }

        $audit = new audit;
        $audit->type = "article";
        $audit->glob_id = $article_id;
        $audit->status = "add";
        $audit->user_id = Auth::User()->id;
        $audit->save();
    

        // $artic = article::find($article_id);
        // $recontimgs = "";
        // if($artic->re_article_id != 0 ){
        //     $recontimgs = contimage::all()->where("article_id",$artic->re_article_id);
        // }

        // $data = [
        //     'article' => article::find($article_id),
        //     'contimage' => contimage::all()->where("article_id",$article_id),
        //     'review' => review::all()->where("article_id",$article_id),
        //     'recontimgs' => $recontimgs,
        //     'articleid'=>$article_id
        // ];
        // $pdf = PDF::loadView('pdfview', $data);
        // return $pdf->download('pdfview.pdf');


        return redirect()->back()->with("Message","Your Article Submitted");
    }
    public function articles(Request $req){
        return view('dashboard')->with('name', 'articles');
    }
    public function viewarticle(Request $req){
        return view('dashboard')->with('name', 'viewarticle')->with("articleid",$req->id);
    }
    public function otherarticles(Request $req){
        return view('dashboard')->with('name', 'otherarticles');
    }
    public function viewarticleadmin(Request $req){
        return view('dashboard')->with('name', 'viewarticleadmin')->with("articleid",$req->id);
    }
    public function addreview(Request $req){
        $article_id = $req->id;
        $review = new review;

        $review->note = $req->review;
        $review->status	 = $req->status;
        $review->article_id = $article_id;
        $review->user_id = Auth::User()->id;
        $review->save(); 

        $audit = new audit;
        $audit->type = "review";
        $audit->glob_id = $article_id;
        $audit->status = "add";
        $audit->user_id = Auth::User()->id;
        $audit->save();

        return redirect()->back();
    }
    public function approve(Request $req){
        $article = article::find($req->id);
        $article->update([
            'status' => 1
        ]);
        return redirect()->back();
    }
    public function unapprove(Request $req){
        $article = article::find($req->id);
        $article->update([
            'status' => 0
        ]);
        return redirect()->back();
    }
    public function editarticle(Request $req){
        return view('dashboard')->with('name', 'editarticle')->with("articleid",$req->id);
    }
    public function updatearticle(Request $req){
        $article = article::find($req->id);
        $article->update([
            'name' => $req->name,
            'content' => $req->content
        ]);

        $contimgs = [];
        $article_id = $req->id;
        if(isset($req->file)){
            foreach($req->file as $file){
                $name = $file->getClientOriginalName();
                $path = "uploads/images/".$article_id."/";
                $file->move($path, $name);
                $contimgs[] = $name; 
            }
        }
       
        foreach($contimgs as $cimg){
            $contimage = new contimage;
            $contimage->url = $cimg;
            $contimage->article_id = $article_id;
            $contimage->save();
        }

        $audit = new audit;
        $audit->type = "article";
        $audit->glob_id = $article_id;
        $audit->status = "update";
        $audit->user_id = Auth::User()->id;
        $audit->save();

        return redirect()->back();
    }
    public function rewrite(Request $req){
        return view('dashboard')->with('name', 'rewrite')->with("articleid",$req->id);
    }

    public function rewritearticle(Request $req){
        $name = $req->name;
        $content = $req->content;
        
        $article = new article;
        $article->name = $name;
        $article->content = $content;
        $article->user_id = Auth::User()->id;
        $article->fac_id = Auth::User()->fac_id;
        $article->dept_id = Auth::User()->dept_id;
        $article->re_article_id = $req->id;
        $article->save();


        $article_id = $article->id;
        $contimgs = [];
        if(isset($req->file)){
            foreach($req->file as $file){
                $name = $file->getClientOriginalName();
                $path = "uploads/images/".$article_id."/";
                $file->move($path, $name);
                $contimgs[] = $name; 
            }
        }
      
        foreach($contimgs as $cimg){
            $contimage = new contimage;
            $contimage->url = $cimg;
            $contimage->article_id = $article_id;
            $contimage->save();
        }

        $audit = new audit;
        $audit->type = "article";
        $audit->glob_id = $article_id;
        $audit->status = "add";
        $audit->user_id = Auth::User()->id;
        $audit->save();

        return redirect()->back();
    }
    public function webarticles(Request $req){
        return view('dashboard')->with('name', 'webarticles');
    }
    public function generatePDF(Request $req){
        $article_id = $req->id;
        $artic = article::find($article_id);
        $recontimgs = "";
        if($artic->re_article_id != 0 ){
            $recontimgs = contimage::all()->where("article_id",$artic->re_article_id);
        }

        $data = [
            'article' => article::find($article_id),
            'contimage' => contimage::all()->where("article_id",$article_id),
            'review' => review::all()->where("article_id",$article_id),
            'recontimgs' => $recontimgs,
            'articleid'=>$article_id
        ];
        $pdf = PDF::loadView('pdfview', $data);
        $pdf->getDomPDF()->setHttpContext(
            stream_context_create([
                'ssl' => [
                    'allow_self_signed'=> TRUE,
                    'verify_peer' => FALSE,
                    'verify_peer_name' => FALSE,
                ]
            ])
        );

        return $pdf->download('pdfview.pdf');
    }

    public function articlesettings(Request $req){
        return view('dashboard')->with('name', 'articlesettings');
    }
    public function articlesettingsau(Request $req){
        if(isset($req->addsetting)){

            $artis = new Articlesetting;
            $artis->title = $req->tccount;
            $artis->content = $req->cccount;
            $artis->save();
            return redirect()->back();


        }else if(isset($req->updatesetting)){
            $artis = Articlesetting::find(1);
            $artis->update([
                'title' => $req->tccount,
                'content' => $req->cccount
            ]);
            return redirect()->back();
        }
    }

}
