<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;

class CinemaController extends Controller
{
    public function halls()
    {
        return $this->hasMany('App\Hall');
    }
}