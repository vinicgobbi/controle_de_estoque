<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EstoqueCategoria;
class CategoriaController extends Controller
{
    public function getCategoria()
    {
        $categorias = EstoqueCategoria::all();
        return view('get_categoria', compact('categorias'));
    }

    public function createCategoria()
    {
        
    }

    public function updateCategoria()
    {

    }
}
