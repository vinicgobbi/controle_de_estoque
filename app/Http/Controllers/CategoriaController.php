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

    public function createCategoria(Request $request)
    {
        $validated = $request->validate([
            'nome'          => 'required'
        ],[
            'nome.required' =>  'Insira um nome para categoria antes de continuar',
        ]);

        EstoqueCategoria::create($validated);

        return redirect()->route('categorias');
    }

    public function updateCategoria()
    {

    }
}
