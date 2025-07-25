<?php

namespace App\Http\Controllers;

use App\Models\EstoqueAlmoxarifado;
use Illuminate\Http\Request;

class AlmoxarifadoController extends Controller
{
    public function getAlmoxarifado()
    {
        $almoxarifados = EstoqueAlmoxarifado::all();
        return view('get_almoxarifado', compact('almoxarifados'));
    }

    public function createAlmoxarifado(Request $request)
    {
        $validated = $request->validate([
            'nome'          => 'required'
        ],[
            'nome.required' =>  'Insira um nome para o almoxarifado antes de continuar',
        ]);

        EstoqueAlmoxarifado::create($validated);

        return redirect()->route('almoxarifados');  
    }

    public function updateAlmoxarifado()
    {

    }

}

