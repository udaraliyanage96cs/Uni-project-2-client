<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\audit;
use Auth;

class activitylog extends Component
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
            $logs = audit::all()->sortDesc();
        }else if(Auth::User()->desig_id == 1){
            $logs = audit::all()->where('user_id',Auth::User()->id)->sortDesc();
        }else if(Auth::User()->desig_id == 2 || Auth::User()->desig_id == 4){
            $logs = audit::join('users', 'users.id', '=', 'audits.user_id')
            ->where('users.dept_id', Auth::User()->dept_id)
            ->get(['audits.*'])->sortDesc();
        }else{
            $logs = "";
        }
        return view('components.activitylog')->with('logs',$logs);

        
    }
}
