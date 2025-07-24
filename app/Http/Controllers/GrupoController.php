<?php

namespace App\Http\Controllers;

use App\Models\EstoqueGrupo;
use Illuminate\Http\Request;

class GrupoController extends Controller
{
    public function getGrupo()
    {
        $grupos = EstoqueGrupo::all();
        return view('get_grupo', compact('grupos'));
    }

    public function createGrupo(Request $request)
    {
        $validated = $request->validate([
            'nome'              => 'required|min:3|max:100'
        ],[
            'nome.required'     => 'Digite um nome para o grupo antes de continuar'
        ]);

        EstoqueGrupo::create($validated);

        return redirect()->route('grupos');
    }

    public function updateGrupo()
    {

    }
}
