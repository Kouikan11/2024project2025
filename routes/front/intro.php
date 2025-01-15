<?php

use App\Http\Controllers\front\intro_gmController;
use App\Http\Controllers\front\intro_systemController;
use App\Http\Controllers\Front\introController;
use Illuminate\Support\Facades\Route;

Route::get('/intro', [introController::class, "list"]);
Route::get('/intro_system', [intro_systemController::class, "list"]);
Route::get('/intro_gm', [intro_gmController::class, "list"]);
