<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\User;
use Auth;

class users extends Component
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
        if(Auth::User()->desig_id == 0){

        $User = User::all()->where('fac_id','!=',0);
        
        }else if(Auth::User()->desig_id == 2 ||Auth::User()->desig_id == 4){
            $User = User::all()->where('dept_id',Auth::User()->dept_id);
        }
        return view('components.users')->with('users',$User);
    }
}
