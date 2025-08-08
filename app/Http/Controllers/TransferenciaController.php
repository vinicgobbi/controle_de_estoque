<?php

namespace App\Http\Controllers;

use App\Models\EstoqueAlmoxarifado;
use App\Models\EstoqueProduto;
use App\Models\EstoqueTransferencia;
use App\Models\EstoqueUsuario;
use Illuminate\Http\Request;

class TransferenciaController extends Controller
{
    public function getTransferencia()
    {
        $transferencias = EstoqueTransferencia::all();
        $produtos = EstoqueProduto::all();
        $almoxarifados = EstoqueAlmoxarifado::all();
        $usuarios = EstoqueUsuario::all();
        return view('transferencia.get_transferencia', compact('transferencias', 'produtos', 'almoxarifados', 'usuarios'));
    }
}
