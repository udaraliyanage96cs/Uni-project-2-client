<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\article;
use Auth;

class articles extends Component
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
        return view('components.articles')->with('article',article::all()->where('user_id',Auth::User()->id));
    }
}
