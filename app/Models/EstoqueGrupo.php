<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EstoqueGrupo extends Model
{
    protected $table = 'estoque_grupo';

    protected $fillable = [
        'nome',
        'categoria_id'
    ];
}
