<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EstoqueAlmoxarifado extends Model
{
    protected $table = 'estoque_almoxarifado';

    protected $fillable = [
        'nome'
    ];

}
