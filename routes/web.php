<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\V1\HomeController;

Route::get("/", [HomeController::class, "home"])
    ->name("home");
