<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EstoqueMedProduto extends Model
{
    protected $table = 'ESTOQUE_MED_PRODUTO';
    protected $primaryKey = 'ID';

    protected $fillable = [
    'COD_PROD',
    'ALMOX_PROD',
    'DESC_PROD',
    'QUANT_PROD',
    'QUANT_MIN_PROD',
    'CATEGORIA_ID',
    'GRUPO_ID',
    ];
}
