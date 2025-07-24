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

    public function createAlmoxarifado()
    {

    }

    public function updateAlmoxarifado()
    {

    }

}

