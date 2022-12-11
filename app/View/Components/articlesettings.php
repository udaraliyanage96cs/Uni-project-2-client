<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Articlesetting;

class articlesettings extends Component
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

        return view('components.articlesettings')->with("arsetting",Articlesetting::find(1));
    }
}
