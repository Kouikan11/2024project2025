<?php

use App\Http\Controllers\Front\IndexController;
use Illuminate\Support\Facades\Route;

require "profileManage.php";
require "recruit.php";
require "intro.php";

//前台
Route::get('/', [IndexController::class, "index"]);
Route::post('/submit-message', [IndexController::class, 'submitMessage'])->name('submit.message');