<?php

use App\Http\Controllers\admin\adminGmController;
use Illuminate\Support\Facades\Route;


Route::group(["middleware"=> "manager","prefix" => "/admin/gm/"],function(){
    Route::get("list", [adminGmController::class, "list"]);
    Route::get("add", [adminGmController::class, "add"]);
    Route::post("insert", [adminGmController::class, "insert"]);
    Route::get("edit/{id}", [adminGmController::class, "edit"]);
    Route::post("update", [adminGmController::class, "update"]);
    Route::post("delete", [adminGmController::class, "delete"]);
});