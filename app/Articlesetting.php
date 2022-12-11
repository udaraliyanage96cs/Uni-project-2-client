<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Articlesetting extends Model
{
    protected $fillable = [
        'title', 'content'
    ];
}
