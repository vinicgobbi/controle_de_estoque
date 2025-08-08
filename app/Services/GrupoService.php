<?php

namespace App\Services;

use App\Models\EstoqueGrupo;

class GrupoService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function getGrupos()
    {
        return EstoqueGrupo::all();
    }

    public function getGrupoPorCategoria($categoriaId)
    {
        return EstoqueGrupo::where('categoria_id', $categoriaId)->get();
    }

    public function createGrupo(array $data)
    {
        return EstoqueGrupo::create($data);
    }

}
