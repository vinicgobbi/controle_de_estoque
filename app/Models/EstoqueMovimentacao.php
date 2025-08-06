<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EstoqueMovimentacao extends Model
{
    protected $table = 'estoque_movimentacao';

    protected $fillable = [
        'tipo',
        'produto_id',
        'quantidade'
    ];
}
