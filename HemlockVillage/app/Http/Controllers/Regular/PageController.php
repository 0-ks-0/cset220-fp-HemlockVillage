<?php

namespace App\Http\Controllers\Regular;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PageController extends Controller
{
    public static function landing()
    {
        return view("landing");
    }

    public static function home()
    {
        return view("home");
    }
}
