<?php

use App\Http\Controllers\V1\Auth\LoginController;
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
});
