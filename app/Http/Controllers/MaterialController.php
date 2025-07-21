<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Models\EstoqueMedProduto;

class MaterialController extends Controller
{
    public function index()
    {
        return view('material.index');
    }

    // GET
    public function show()
    {
        return EstoqueMedProduto::all();
    }

    public function createMaterial(Request $request)
    {
        dd($request);
    }

    public function updateMaterial()
    {

    }

    public function deleteMaterial()
    {

    }
}
