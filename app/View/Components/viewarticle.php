<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\article;
use App\contimage;
use App\review;
use App\reviewreply;
use Auth;
use Illuminate\Support\Facades\DB;

class viewarticle extends Component
{
    public $articleid;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    
    public function __construct($articleid)
    {
        $this->articleid = $articleid;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        $artic = article::find($this->articleid);
        $recontimgs = "";
        if($artic->re_article_id != 0 ){
            $recontimgs = contimage::all()->where("article_id",$artic->re_article_id);
        }
        return view('components.viewarticle')->with("article",article::find($this->articleid))->with("contimage",contimage::all()->where("article_id",$this->articleid))
        ->with("review",review::all()->where("article_id",$this->articleid))
        ->with("recontimgs",$recontimgs);

    }
}
