<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\smeeting;
use Auth;

class meeting extends Component
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
        if(Auth::User()->desig_id != 4){
            return view('components.meeting')->with("meeting",smeeting::all()->where("dept_id",Auth::User()->dept_id));
        }else{
            return view('components.meeting')->with("meeting",smeeting::all());
        }
    }
}
