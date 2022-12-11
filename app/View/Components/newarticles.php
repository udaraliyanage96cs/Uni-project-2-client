<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\department;
use App\faculty;
use App\Articlesetting;

class newarticles extends Component
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
        return view('components.newarticles')->with('faculty',faculty::all())->with('department',department::all())->with("arsetting",Articlesetting::find(1));
    }
}
