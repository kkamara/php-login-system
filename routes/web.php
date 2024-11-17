<?php

use App\Http\Controllers\V1\Auth\LoginController;
use App\Http\Controllers\V1\Auth\RegisterController;
use App\Http\Controllers\V1\User\ProfileController;
use App\Http\Controllers\V1\User\SettingController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\V1\HomeController;

Route::get("/", [HomeController::class, "home"])
    ->name("home");
Route::prefix("/user")->group(function () {
    Route::middleware("guest")
        ->get("/login", [LoginController::class, "login"])
        ->name("login");
    Route::middleware("guest")
        ->post("/login", [LoginController::class, "loginSubmit"])
        ->name("login.submit");
    Route::middleware("auth")
        ->get("/logout", [LoginController::class, "logout"])
        ->name("logout");
    Route::middleware("guest")
        ->get("/register", [RegisterController::class, "register"])
        ->name("register");
    Route::middleware("guest")
        ->post("/register", [RegisterController::class, "registerSubmit"])
        ->name("register.submit");
    Route::middleware("auth")
        ->get("/settings", [SettingController::class, "settings"])
        ->name("settings");
    Route::middleware("auth")
        ->post("/settings", [SettingController::class, "settingsSubmit"])
        ->name("settings.submit");
    Route::middleware("auth")
        ->get("/profile", [ProfileController::class, "profile"])
        ->name("profile");
});
