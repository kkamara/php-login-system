<?php

namespace App\Http\Controllers\V1\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login() {
        return view(
            "v1/auth/login",
            ["title" => "Login"],
        );
    }

    public function loginSubmit(Request $request) {
        return redirect()
            ->back()
            ->withInput()
            ->withErrors(["Something went wrong."]);
    }
}
