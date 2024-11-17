<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home() {
        return view(
            "v1/home",
            [ "title" => "Home Page", ],
        );
    }
}
