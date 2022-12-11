<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\article;
use App\audit;
use App\smeeting;
use Auth;

class subdashboard extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
       

        if(Auth::User()->desig_id == 0){
            $article = article::where('fac_id','!=',0)->orderBy('id', 'desc')->get();
        }else if(Auth::User()->desig_id == 2 || Auth::User()->desig_id == 4){
            $article = article::where('dept_id',Auth::User()->dept_id)->orderBy('id', 'desc')->get();
        }else if(Auth::User()->desig_id == 5){
            $article = article::all()->where('status','!=',0);
        }else{
            $article = "";
        }

        $meetings = '';

        if(Auth::User()->desig_id == 0 || Auth::User()->desig_id == 5){
            $notify = article::join('audits', 'audits.glob_id', '=', 'articles.id')
            ->where('audits.type','=','reply')
            ->orWhere('audits.type','=','review')
            ->get(['audits.*','articles.id']);

            $meetings = smeeting::all();
           

        }else{
            $notify = article::join('audits', 'audits.glob_id', '=', 'articles.id')
            ->where('audits.type','=','reply')
            ->where('audits.user_id','=',Auth::User()->id)
            ->orWhere('audits.type','=','review')
            ->get(['audits.*','articles.id']);

            $meetings = smeeting::all()->where("dept_id",Auth::User()->dept_id);
        }
      
        $top_stories = count(article::all()->where('category_id','1'));
        $news = count(article::all()->where('category_id','2'));
        $career = count(article::all()->where('category_id','3'));
        $total = $top_stories+$news+$career;
        //print_r($notify[1]);
        $date = today()->format('Y-m-d');

       
        return view('components.subdashboard')->with('article',$article)->with('alogs',$notify)->with("meeting",$meetings)
        ->with('top_stories',$top_stories)
        ->with('news',$news)
        ->with('career',$career)
        ->with('total',$total)
        ->with('today',$date);
    }
}
