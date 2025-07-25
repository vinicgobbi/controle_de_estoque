<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EstoqueCategoria;
class CategoriaController extends Controller
{
    public function getCategoria()
    {
        $categorias = EstoqueCategoria::all();
        return view('get_categoria', compact('categorias'));
    }

    public function getCategoriaPorAlmox($almox_id)
    {
        $categorias = EstoqueCategoria::where('almox_id', $almox_id)->get();

        return response()->json($categorias);
    }

    public function createCategoria(Request $request)
    {
        $validated = $request->validate([
            'nome'          => 'required',
            'almox_id'      => 'required'
        ],[
            'nome.required'         =>  'Insira um nome para categoria antes de continuar',
            'almox_id.required'     =>  'Selecione um almoxarifado antes de continuar'
        ]);

        EstoqueCategoria::create($validated);

        return redirect()->route('categorias');
    }

    public function updateCategoria()
    {

    }
}
