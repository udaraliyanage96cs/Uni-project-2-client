<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\article;

class webarticles extends Component
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
        return view('components.webarticles')->with('article',article::all()->where('status','!=',0));
    }
}
