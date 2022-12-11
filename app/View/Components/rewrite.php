<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\article;
use App\contimage;

class rewrite extends Component
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
        return view('components.rewrite')->with('article',article::find($this->articleid))
        ->with("contimage",contimage::all()->where("article_id",$this->articleid));;
    }
}
