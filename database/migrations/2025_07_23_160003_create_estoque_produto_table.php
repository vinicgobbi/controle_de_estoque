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
        Schema::create('estoque_produto', function (Blueprint $table) {
            $table->id();
            $table->string('nome_prod',50);
            $table->string('desc_prod', 255)->nullable();
            $table->string('cod_prod', 6)->unique();
            $table->integer('quant_prod')->default(0);
            $table->integer('quant_min_prod');
            $table->foreignId('almox_id')->constrained('estoque_almoxarifado');
            $table->foreignId('categoria_id')->constrained('estoque_categoria');
            $table->foreignId('grupo_id')->constrained('estoque_grupo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('estoque_produto');
    }
};
