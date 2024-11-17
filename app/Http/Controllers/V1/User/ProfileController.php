<?php

namespace App\Http\Controllers\V1\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function profile() {
        return view(
            "v1/user/profile",
            [
                "title" => "Profile",
                "user" => auth()->user(),
            ]
        );
    }
}
