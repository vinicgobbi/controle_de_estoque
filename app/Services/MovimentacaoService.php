<?php

namespace App\Services;

use App\Models\EstoqueMovimentacao;

class MovimentacaoService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function getMovimentacoes()
    {
        return EstoqueMovimentacao::all();
    }

    public function getMovimentacoesWithFilters($filters)
    {
        $movimentacao = EstoqueMovimentacao::query();

        if (isset($filters['prod'])) {
            $movimentacao->where('produto_id', $filters['prod']);
        }

        if (isset($filters['almox'])) {
            $movimentacao->where('almoxarifado_id', $filters['almox']);
        }

        if (isset($filters['tipo'])) {
            $movimentacao->where('tipo', $filters['tipo']);
        }

        if (isset($filters['user'])) {
            $movimentacao->where('usuario_id', $filters['user']);
        }

        return $movimentacao->with(['produto', 'almoxarifado', 'usuario'])->get();
    }

    public function createMovimentacao($data, $usuario)
    {
        $data['usuario_id'] = $usuario;

        EstoqueMovimentacao::create($data);
    }

    
}
