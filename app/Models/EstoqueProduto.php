<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstoqueProduto extends Model
{
    use HasFactory;

    protected $table = 'estoque_produto';

    protected $fillable = [
    'nome_prod',
    'desc_prod',
    'quant_prod',
    'quant_min_prod',
    'almox_id',
    'categoria_id',
    'grupo_id',
    'unidade_id'
    ];

    public function grupo()
    {
        return $this->belongsTo(EstoqueGrupo::class, 'grupo_id');
    }

    public function unidade()
    {
        return $this->belongsTo(EstoqueUnidade::class, 'unidade_id');
    }

    public function categoria()
    {
        return $this->belongsTo(EstoqueCategoria::class, 'categoria_id');
    }
}
