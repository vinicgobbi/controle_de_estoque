<?php

namespace Database\Factories;

use App\Models\EstoqueUnidade;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\EstoqueUnidade>
 */
class EstoqueUnidadeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = EstoqueUnidade::class;

    public function definition(): array
    {
        return [
            'nome' => fake()->lexify(str_repeat('?', 3))
        ];
    }
}
