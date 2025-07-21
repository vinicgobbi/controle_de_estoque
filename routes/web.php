<?php

use App\Http\Controllers\MaterialController;
use Illuminate\Support\Facades\Route;

Route::get('/', [MaterialController::class, 'index'])->name('index');

Route::get('/index', [MaterialController::class, 'show'])->name('show');