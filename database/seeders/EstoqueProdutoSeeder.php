<?php

namespace Database\Seeders;

use App\Models\EstoqueAlmoxarifado;
use App\Models\EstoqueCategoria;
use App\Models\EstoqueGrupo;
use App\Models\EstoqueProduto;
use App\Models\EstoqueUnidade;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EstoqueProdutoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categorias = EstoqueCategoria::factory()->count(10)->create();
        $grupos = EstoqueGrupo::factory()->count(30)->create([
                'categoria_id' => fn () => $categorias->random()->id,
            ]);
        $unidades = EstoqueUnidade::factory()->count(15)->create();
        $almoxarifados = EstoqueAlmoxarifado::factory()->count(3)->create();

        EstoqueProduto::factory()->count(1000)->create([
            'categoria_id' => fn () => $categorias->random()->id,
            'grupo_id' => fn () => $grupos->random()->id,
            'almox_id' => fn () => $almoxarifados->random()->id,
            'unidade_id' => fn () => $unidades->random()->id,
        ]);
    }
}
