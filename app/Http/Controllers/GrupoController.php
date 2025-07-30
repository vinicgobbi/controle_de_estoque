<?php

namespace App\Http\Controllers;

use App\Models\EstoqueCategoria;
use App\Models\EstoqueGrupo;
use Illuminate\Http\Request;

class GrupoController extends Controller
{
    public function getGrupo()
    {
        $grupos = EstoqueGrupo::all();
        $categorias = EstoqueCategoria::all()->toArray();
        return view('grupo.get_grupo', compact('grupos', 'categorias'));
    }

    public function getGrupoPorCategoria($categoria_id)
    {
        $grupos = EstoqueGrupo::where('categoria_id', $categoria_id)->get();

        return response()->json($grupos);
    }

    public function createGrupo(Request $request)
    {
        $validated = $request->validate([
            'nome'              => 'required|min:3|max:100',
            'categoria_id'      => 'required'
        ],[
            'nome.required'         => 'Digite um nome para o grupo antes de continuar',
            'categoria_id.required' => 'Selecione uma categoria antes de continuars'
        ]);

        EstoqueGrupo::create($validated);

        return redirect()->route('grupos');
    }

    public function updateGrupo()
    {

    }
}
