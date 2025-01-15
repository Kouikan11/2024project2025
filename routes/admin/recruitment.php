<?php

use App\Http\Controllers\admin\adminRecruitController;
use Illuminate\Support\Facades\Route;

Route::group(["middleware"=> "manager","prefix" => "/admin/recruitment/"],function(){
    Route::get("list", [adminRecruitController::class, "list"]);
    Route::get("add", [adminRecruitController::class, "add"]);
    Route::post("insert", [adminRecruitController::class, "insert"]);
    Route::get("edit/{id}", [adminRecruitController::class, "edit"]);
    Route::post("update", [adminRecruitController::class, "update"]);
    Route::post("delete", [adminRecruitController::class, "delete"]);
    Route::get("list",[adminRecruitController::class, "getAttend"]);
});