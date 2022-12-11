<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\article;
use Auth;

class otherarticles extends Component
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
        $top_stories = count(article::all()->where('category_id','1'));
        $news = count(article::all()->where('category_id','2'));
        $career = count(article::all()->where('category_id','3'));
        $other = count(article::all()->where('category_id','0'));
        $today = today()->format('Y-m-d');



        return view('components.otherarticles')
        ->with('aorticle',article::all()->where('dept_id',Auth::User()->dept_id)->sortDesc())
        ->with('top_stories',$top_stories)
        ->with('news',$news)
        ->with('career',$career)
        ->with('other',$other)
        ->with('today',$today);
    }
}
