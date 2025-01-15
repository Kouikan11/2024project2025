<?php

use App\Http\Controllers\front\profile_manageController;
use Illuminate\Support\Facades\Route;

Route::get('/login', [profile_manageController::class, "login"]);
Route::post('/doLogin', [profile_manageController::class, "doLogin"]);
Route::get('/register', [profile_manageController::class, "register"]);
Route::post('/doRegister', [profile_manageController::class, "doRegister"]);
Route::get('/forget', [profile_manageController::class, "forget"]);
Route::post('/forgetsubmit',[profile_manageController::class,"store"])->name('forgetsubmit');
Route::get('/logout', [profile_manageController::class, "logout"]);
Route::get('/revise', [profile_manageController::class, "revise"]);
Route::post('/revise', [profile_manageController::class, "reset"])->name('password.reset');


Route::group(["middleware" => "user", "prefix" => "/"], function () {
    Route::get("user", [profile_manageController::class, "edit"]);
    Route::post("user/{id}", [profile_manageController::class, "update"]);
    Route::post("user/hasUser",[profile_manageController::class,"hasUser"]);
});