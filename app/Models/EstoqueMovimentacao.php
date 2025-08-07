<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EstoqueMovimentacao extends Model
{
    protected $table = 'estoque_movimentacao';

    protected $fillable = [
        'tipo',
        'produto_id',
        'almoxarifado_id',
        'usuario_id',
        'saldo'
    ];

    public function produto()
    {
        return $this->belongsTo(EstoqueProduto::class);
    }

    public function almoxarifado()
    {
        return $this->belongsTo(EstoqueAlmoxarifado::class);
    }

    public function usuario()
    {
        return $this->belongsTo(EstoqueUsuario::class);
    }
}
