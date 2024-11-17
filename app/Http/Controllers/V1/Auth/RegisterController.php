<?php

namespace App\Http\Controllers\V1\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class RegisterController extends Controller
{
    public function register() {
        return view(
            "v1/auth/register",
            ["title" => "Register"],
        );
    }

    public function registerSubmit(Request $request) {
        $validator = Validator::make($request->all(), [
            "name" => "required",
            "email" => "required|email|unique:users",
            "password" => ["required", "required_with:passwordConfirmed", "same:passwordConfirmed"],
        ]);
        $credentials = [
            "name" => filter_var($request->input("name"), FILTER_SANITIZE_STRING),
            "email" => filter_var($request->input("email"), FILTER_SANITIZE_EMAIL),
            "password" => filter_var($request->input("password"), FILTER_SANITIZE_STRING),
            "passwordConfirmed" => $request->input("passwordConfirmed") ?
                filter_var($request->input("passwordConfirmed"), FILTER_SANITIZE_STRING) :
                null,
        ];

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withInput($credentials)
                ->withErrors($validator->errors());
        }

        $user = new User();
        $user->name = $credentials["name"];
        $user->email = $credentials["email"];
        $user->password = Hash::make($credentials["password"]);
        $user->save();

        Auth::login($user);

        return redirect()->route("home");
    }
}
