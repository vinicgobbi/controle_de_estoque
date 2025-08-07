<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstoqueGrupo extends Model
{
    use HasFactory;

    protected $table = 'estoque_grupo';

    protected $fillable = [
        'nome',
        'categoria_id'
    ];

    public function categoria()
    {
        return $this->belongsTo(EstoqueCategoria::class);
    }
}
