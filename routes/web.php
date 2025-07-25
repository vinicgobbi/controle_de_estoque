<?php

use App\Http\Controllers\AlmoxarifadoController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\GrupoController;
use App\Http\Controllers\ProdutoController;
use App\Models\EstoqueAlmoxarifado;
use App\Models\EstoqueCategoria;
use App\Models\EstoqueGrupo;
use Illuminate\Support\Facades\Route;

Route::get('/', [ProdutoController::class, 'index'])->name('index');

Route::get('/show', [ProdutoController::class, 'getProduto'])->name('show');



//Rotas referente a produto
Route::get('/produtos/criar', function () { //retorna a view de criar produto
	$categorias = EstoqueCategoria::all();
    $grupos = EstoqueGrupo::all();
	$almoxarifados = EstoqueAlmoxarifado::all();
	return view('criar_produto', compact('categorias', 'grupos', 'almoxarifados'));
})->name('criar-produto');
Route::post('/produtos/criar', [ProdutoController::class, 'createProduto'])->name('create-produto'); // URL que cria um produto e salva no banco
Route::put('/produtos/{id}', [ProdutoController::class, 'updateProduto'])->name('update-produto'); // URL para editar o produto no banco
Route::get('/produtos/{id}/editar', [ProdutoController::class, 'edit'])->name('edit'); // URL que retorna a View para realizar edição

//Rotas referentes a Almoxarifados
Route::get('/almoxarifados', [AlmoxarifadoController::class, 'getAlmoxarifado'])->name('almoxarifados');
Route::post('/almoxarifados/criar', [AlmoxarifadoController::class, 'createAlmoxarifado'])->name('create-almoxarifado');
Route::get('/almoxarifados/criar', function (){
	return view('criar_almoxarifado');
})->name('criar-almoxarifado');

//Rotas referentes a Categorias
Route::get('/categorias', [CategoriaController::class, 'getCategoria'])->name('categorias');
Route::post('/categorias/criar', [CategoriaController::class, 'createCategoria'])->name('create-categoria');
Route::get('/categorias/criar', function (){
	$almoxarifados = EstoqueAlmoxarifado::all();
	return view('criar_categoria', compact('almoxarifados'));
})->name('criar-categoria');
Route::get('/categorias/almox/{almox_id}',[CategoriaController::class, 'getCategoriaPorAlmox']);

//Rotas referentes a grupos
Route::get('/grupos', [GrupoController::class, 'getGrupo'])->name('grupos');
Route::post('/grupos/criar', [GrupoController::class, 'createGrupo'])->name('create-grupo');
Route::get('/grupos/criar', function (){
	$categorias = EstoqueCategoria::all();
	return view('criar_grupo', compact('categorias'));
})->name('criar-grupo');
Route::get('/grupos/categoria/{categoria_id}', [GrupoController::class, 'getGrupoPorCategoria']);
