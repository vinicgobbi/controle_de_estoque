<?php

namespace App\Services;

use App\Models\EstoqueAlmoxarifado;
use Illuminate\Http\Request;

class AlmoxarifadoService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function getAlmoxarifados()
    {
        return EstoqueAlmoxarifado::all();
    }

    public function createAlmoxarifado(array $data)
    {

        return EstoqueAlmoxarifado::create($data);
    }
}
