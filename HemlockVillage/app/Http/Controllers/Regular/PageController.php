<?php

namespace App\Http\Controllers\Regular;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Controllers\Api\UserAPI;

class PageController extends Controller
{
    public static function landing()
    {
        return view("landing");
    }

    public static function users()
    {
        return view("users")->with([
            "data" => UserAPI::index()
        ]);
    }

    public static function home()
    {
        return view("home");
    }
}
