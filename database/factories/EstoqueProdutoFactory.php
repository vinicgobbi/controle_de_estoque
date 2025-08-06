<?php

namespace Database\Factories;

use App\Models\EstoqueAlmoxarifado;
use App\Models\EstoqueCategoria;
use App\Models\EstoqueGrupo;
use App\Models\EstoqueProduto;
use App\Models\EstoqueUnidade;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\EstoqueProduto>
 */
class EstoqueProdutoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = EstoqueProduto::class;

    public function definition(): array
    {
        
        return [
            'nome_prod' => fake()->word(),
            'desc_prod' => fake()->word(),
            'quant_prod' => 0,
            'quant_min_prod' => fake()->numberBetween(0,100),
            'almox_id' => null,
            'categoria_id' => null,
            'grupo_id' => null,
            'unidade_id' => null
        ];
    }
}
