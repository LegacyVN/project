<?php

use App\Http\Controllers\HomeUserController;
use Illuminate\Support\Facades\Route;

Route::group(["prefix"=> ""], function () {
    Route::get("/",[HomeUserController::class,"index"]);
    Route::get("/home",[HomeUserController::class,"index"]);
    Route::get("/home/index",[HomeUserController::class,"index"]);
});
