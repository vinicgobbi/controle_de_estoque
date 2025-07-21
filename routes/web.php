<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\GrupoController;
use App\Http\Controllers\MaterialController;
use Illuminate\Support\Facades\Route;

Route::get('/', [MaterialController::class, 'index'])->name('index');

Route::get('/index', [MaterialController::class, 'show'])->name('show');

Route::get('/categorias', [CategoriaController::class, 'getCategoria'])->name('categorias');

Route::get('/grupos', [GrupoController::class, 'getGrupo'])->name('grupos');