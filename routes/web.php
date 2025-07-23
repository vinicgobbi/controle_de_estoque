<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\GrupoController;
use App\Http\Controllers\ProdutoController;
use App\Models\EstoqueAlmoxarifado;
use App\Models\EstoqueCategoria;
use App\Models\EstoqueGrupo;
use Illuminate\Support\Facades\Route;

Route::get('/', [ProdutoController::class, 'index'])->name('index');

Route::get('/show', [ProdutoController::class, 'getProduto'])->name('show');

Route::get('/categorias', [CategoriaController::class, 'getCategoria'])->name('categorias');

Route::get('/grupos', [GrupoController::class, 'getGrupo'])->name('grupos');

Route::get('/criar-produto', function () { //retorna a view de criar produto
	$categorias = EstoqueCategoria::all();
    $grupos = EstoqueGrupo::all();
	$almoxarifados = EstoqueAlmoxarifado::all();
	return view('criar_produto', compact('categorias', 'grupos', 'almoxarifados'));
})->name('criar-produto');
Route::post('/criar-produto/criar', [ProdutoController::class, 'createProduto'])->name('create-produto'); // URL que cria um produto e salva no banco

Route::put('/produtos/{id}', [ProdutoController::class, 'updateProduto'])->name('update-produto'); // URL para editar o produto no banco
Route::get('/produtos/{id}/editar', [ProdutoController::class, 'edit'])->name('edit'); // URL que retorna a View para realizar edição

Route::get('/categoria', [CategoriaController::class, 'getCategoria'])->name('get-categoria');