<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('estoque_saldo', function (Blueprint $table) {
            $table->id();
            $table->foreignId('produto_id')->constrained('estoque_produto');
            $table->foreignId('almoxarifado_id')->constrained('estoque_almoxarifado');
            $table->integer('saldo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('estoque_saldo');
    }
};
