<?php

namespace App\Http\Controllers\V1\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login() {
        return view(
            "v1/auth/login",
            ["title" => "Login"],
        );
    }

    public function loginSubmit(Request $request) {
        $validator = Validator::make($request->all(), [
            "email" => "required|email",
            "password" => "required",
            "rememberMe" => "in:true",
        ]);
        $credentials = [
            "email" => filter_var($request->input("email"), FILTER_SANITIZE_EMAIL),
            "password" => filter_var($request->input("password"), FILTER_SANITIZE_STRING),
            "rememberMe" => $request->input("rememberMe") === "true" ? "true" : null,
        ];

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withInput($credentials)
                ->withErrors($validator->errors());
        }

        $attemptCredentials = array_filter($credentials, function($key) {
            if ($key !== "rememberMe") {
                return true;
            }
            return false;
        }, ARRAY_FILTER_USE_KEY);
        if (!Auth::attempt(
            $attemptCredentials,
            $credentials["rememberMe"] === "true",
        )) {
            return redirect()
                ->back()
                ->withInput($credentials)
                ->withErrors(["The provided email and password combination is invalid."]);
        }

        return redirect()->route("home");
    }

    public function logout() {
        Auth::logout();
        return redirect()->route("home");
    }
}
