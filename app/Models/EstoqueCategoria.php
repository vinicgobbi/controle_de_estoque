<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EstoqueCategoria extends Model
{
    protected $table = 'estoque_categoria';

    protected $fillable = [
        'nome',
        'almox_id'
    ];

}
