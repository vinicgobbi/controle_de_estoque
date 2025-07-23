<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EstoqueProduto extends Model
{
    protected $table = 'estoque_produto';

    protected $fillable = [
    'nome_prod',
    'cod_prod',
    'desc_prod',
    'quant_prod',
    'quant_min_prod',
    'almox_id',
    'categoria_id',
    'grupo_id',
    ];
}
