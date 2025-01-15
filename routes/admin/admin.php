<?php

use App\Http\Controllers\admin\adminController;
use Illuminate\Support\Facades\Route;

//後台
Route::get('/myadmin', [adminController::class, "login"]);
Route::group(["prefix" => "admin"],function(){
    Route::get("home", [adminController::class, "home"])->middleware("manager");
    Route::post("doLogin", [adminController::class, "doLogin"]);
    Route::get("logout", [adminController::class, "logout"]);
});