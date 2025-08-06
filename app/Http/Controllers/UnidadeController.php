<?php

namespace App\Http\Controllers;

use App\Models\EstoqueUnidade;
use Illuminate\Http\Request;

class UnidadeController extends Controller
{
    public function getUnidade()
    {
        $unidades = EstoqueUnidade::all();
        return view('unidade.get_unidade', compact('unidades'));
    }

    public function createUnidade(Request $request)
    {
        $validated = $request->validate([
            'nome' => 'required|string|max:3',
            'descricao' => 'required|string|max:255'

        ],[
            'nome.required' => 'Digite uma Unidade antes de continuar',
            'nome.max' => 'A unidade não pode ultrapassar 3 caracteres',
            'descricao.required' => 'Digite a descrição da Unidade para prosseguir'
        ]);

        EstoqueUnidade::create($validated);

        return redirect()->route('unidades')->with('success', 'Unidade criada com sucesso');
    }
}
