<?php

use App\Http\Controllers\front\recruitController;
use App\Http\Controllers\front\teamController;
use Illuminate\Support\Facades\Route;

Route::get('/', [recruitController::class, "index"]);

Route::group(["middleware" => "user", "prefix" => "/"], function () {
    Route::get("recruitment", [recruitController::class, "form"]);
    Route::post("recruitment", [recruitController::class, "apply"]);
    Route::get("record", [recruitController::class, "catagory"]);
    Route::post("team", [teamController::class, "insert"]);
    Route::get("team", [teamController::class, "attendNo"]);
});