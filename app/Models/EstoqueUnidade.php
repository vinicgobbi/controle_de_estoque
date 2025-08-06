<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstoqueUnidade extends Model
{
    use HasFactory;

    protected $table = 'estoque_unidade';

    protected $fillable = [
        'nome',
        'descricao'
    ];
}
