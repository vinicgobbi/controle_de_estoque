<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\GrupoController;
use App\Http\Controllers\ProdutoController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ProdutoController::class, 'index'])->name('index');

Route::get('/index', [ProdutoController::class, 'show'])->name('show');

Route::get('/categorias', [CategoriaController::class, 'getCategoria'])->name('categorias');

Route::get('/grupos', [GrupoController::class, 'getGrupo'])->name('grupos');

Route::get('/criar-produto', function () {
	return view('criar_produto');
});

Route::post('/criar-produto/criar', [ProdutoController::class, 'createProduto'])->name('criar-produto');