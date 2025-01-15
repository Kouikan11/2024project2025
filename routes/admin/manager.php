<?php

use App\Http\Controllers\admin\managerController;
use Illuminate\Support\Facades\Route;

Route::group(["middleware"=> "manager","prefix" => "/admin/manager"], function(){
    Route::get("list", [managerController::class, "list"]);
    Route::get("add", [managerController::class, "add"]);
    Route::post("checkManager", [managerController::class, "checkManager"]);
    Route::post("insert", [managerController::class, "insert"]);
    Route::get("edit/{id}", [managerController::class, "edit"]);
    Route::post("update", [managerController::class, "update"]);
    Route::post("delete", [managerController::class, "delete"]);
    Route::post("hasManager",[managerController::class,"hasManager"]);
});