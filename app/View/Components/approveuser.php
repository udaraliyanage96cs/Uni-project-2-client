<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\User;
use Auth;

class approveuser extends Component
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
        
        return view('components.approveuser')->with('users',User::all()->where('desig_id','!=',5)->where('desig_id','!=',0));
    }
}
