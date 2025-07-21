<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EstoqueMedCategoria;
class CategoriaController extends Controller
{
    public function getCategoria()
    {
        return EstoqueMedCategoria::all();
    }
}
