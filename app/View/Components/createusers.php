<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\faculty;
use App\department;
use App\job;

class createusers extends Component
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
        return view('components.createusers')->with('faculty',faculty::all())->with('department',department::all())->with("designation",job::all());;
    }
}
