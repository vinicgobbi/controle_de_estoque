<?php

namespace App\Http\Controllers;

use App\Models\EstoqueAlmoxarifado;
use App\Services\AlmoxarifadoService;
use Illuminate\Http\Request;

class AlmoxarifadoController extends Controller
{
    protected $almoxarifadoService;

    public function __construct()
    {
        $this->almoxarifadoService = new AlmoxarifadoService();
    }

    public function getAlmoxarifado()
    {
        $almoxarifados = $this->almoxarifadoService->getAlmoxarifados();
        return view('almoxarifado.get_almoxarifado', compact('almoxarifados'));
    }

    public function createAlmoxarifado(Request $request)
    {
        $validated = $request->validate([
            'nome'          => 'required'
        ],[
            'nome.required' =>  'Insira um nome para o almoxarifado antes de continuar',
        ]);

        $this->almoxarifadoService->createAlmoxarifado($validated);

        return redirect()->route('almoxarifados');  
    }

    public function updateAlmoxarifado()
    {

    }

}

