<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EstoqueSaldo extends Model
{
    protected $table = 'estoque_saldo';

    protected $fillable = [
        'produto_id',
        'almoxarifado_id',
        'saldo'
    ];

}
