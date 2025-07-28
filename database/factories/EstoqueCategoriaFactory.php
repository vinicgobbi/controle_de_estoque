<?php

namespace Database\Factories;

use App\Models\EstoqueCategoria;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\EstoqueCategoria>
 */
class EstoqueCategoriaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = EstoqueCategoria::class;
    
    public function definition(): array
    {
        return [
            'nome' => fake()->word()
        ];
    }
}
