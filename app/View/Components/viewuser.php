<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\article;
use App\User;

class viewuser extends Component
{
    public $userid;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($userid)
    {
        $this->userid = $userid;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.viewuser')->with("article",article::all()->where('user_id',$this->userid))
        ->with('user',User::find($this->userid));
    }
}
