<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EstoqueTransferencia extends Model
{
    protected $table = 'estoque_transferencia';

    protected $fillable = [
        'produto_id',
        'almoxarifado_saida_id',
        'almoxarifado_destino_id',
        'usuario_id',
        'saldo',
    ];

    public function produto()
    {
        return $this->belongsTo(EstoqueProduto::class, 'produto_id');
    }

    public function almoxarifadoSaida()
    {
        return $this->belongsTo(EstoqueAlmoxarifado::class, 'almoxarifado_saida_id');
    }

    public function almoxarifadoDestino()
    {
        return $this->belongsTo(EstoqueAlmoxarifado::class, 'almoxarifado_destino_id');
    }

    public function usuario()
    {
        return $this->belongsTo(EstoqueUsuario::class, 'usuario_id');
    }
}
