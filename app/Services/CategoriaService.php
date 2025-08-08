<?php

namespace App\Services;

use App\Models\EstoqueCategoria;

class CategoriaService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function getCategorias()
    {
        return EstoqueCategoria::all();
    }

    public function getCategoriaPorAlmox($almoxId)
    {
        return EstoqueCategoria::where('almox_id', $almoxId)->get();
    }

    public function createCategoria(array $data)
    {
        return EstoqueCategoria::create($data);
    }
}
