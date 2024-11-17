<?php

use App\Http\Controllers\V1\Auth\LoginController;
use App\Http\Controllers\V1\Auth\RegisterController;
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
});
