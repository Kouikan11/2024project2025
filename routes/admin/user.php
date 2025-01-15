<?php

use App\Http\Controllers\admin\adminUserController;
use Illuminate\Support\Facades\Route;

Route::group(["middleware" => "manager", "prefix" => "/admin/user"], function () {
    Route::get("list", [adminUserController::class, "list"]);
    Route::get("add", [adminUserController::class, "add"]);
    Route::post("checkUser", [adminUserController::class, "checkUser"]);
    Route::post("insert", [adminUserController::class, "insert"]);
    Route::get("edit/{id}", [adminUserController::class, "edit"]);
    Route::post("update", [adminUserController::class, "update"]);
    Route::post("delete", [adminUserController::class, "delete"]);
    Route::post("hasUser",[adminUserController::class,"hasUser"]);
});