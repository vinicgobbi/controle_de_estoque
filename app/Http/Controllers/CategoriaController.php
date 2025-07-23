<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EstoqueCategoria;
class CategoriaController extends Controller
{
    public function getCategoria()
    {
        return EstoqueCategoria::all();
    }
}
