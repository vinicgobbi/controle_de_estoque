<?php

namespace App\Http\Controllers;

use App\Models\EstoqueMedGrupo;
use Illuminate\Http\Request;

class GrupoController extends Controller
{
    public function getGrupo()
    {
        return EstoqueMedGrupo::all();
    }
}
