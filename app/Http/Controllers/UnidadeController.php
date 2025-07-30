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
}
