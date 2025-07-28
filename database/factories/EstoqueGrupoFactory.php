<?php

namespace Database\Factories;

use App\Models\EstoqueCategoria;
use App\Models\EstoqueGrupo;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\EstoqueGrupo>
 */
class EstoqueGrupoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = EstoqueGrupo::class;

    public function definition(): array
    {
        return [
            'nome' => fake()->word(),
            'categoria_id' => null
        ];
    }
}
