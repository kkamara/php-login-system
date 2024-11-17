<?php

namespace App\Http\Controllers\V1\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class SettingController extends Controller
{
    public function settings() {
        return view(
            "v1/user/settings",
            ["title" => "Settings"],
        );
    }

    public function settingsSubmit(Request $request) {
        $validator = Validator::make($request->all(), [
            "name" => "required",
            "email" => "required|email",
            "newPassword" => "sometimes",
            "password" => ["required", "required_with:passwordConfirmed", "same:passwordConfirmed", "current_password"],
        ]);
        $payload = [
            "name" => filter_var($request->input("name"), FILTER_SANITIZE_STRING),
            "email" => filter_var($request->input("email"), FILTER_SANITIZE_EMAIL),
            "password" => filter_var($request->input("password"), FILTER_SANITIZE_STRING),
            "passwordConfirmed" => $request->input("passwordConfirmed") ?
                filter_var($request->input("passwordConfirmed"), FILTER_SANITIZE_STRING) :
                null,
            "newPassword" => $request->input("newPassword") ?
                filter_var($request->input("newPassword"), FILTER_SANITIZE_STRING) :
                null,
        ];

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withInput($payload)
                ->withErrors($validator->errors());
        }

        $user = auth()->user();
        
        if ($payload["email"] !== $user->email) {
            $otherUsersWithGivenEmail = User::where([
                ["id", "!=", $user->id],
                ["email", "=", $payload["email"]],
            ])->get();
            if ($otherUsersWithGivenEmail->count()) {
                return redirect()
                    ->back()
                    ->withInput($payload)
                    ->withErrors(["The email is already in use."]);
            }
        }

        $user->name = $payload["name"];
        $user->email = $payload["email"];
        if (isset($payload["newPassword"])) {
            $user->password = Hash::make($payload["newPassword"]);
        }
        $user->save();

        return redirect()->route("home");
    }
}
