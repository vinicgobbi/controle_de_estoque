<?php

namespace Database\Factories;

use App\Models\EstoqueAlmoxarifado;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\EstoqueAlmoxarifado>
 */
class EstoqueAlmoxarifadoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = EstoqueAlmoxarifado::class;

    public function definition(): array
    {
        return [
            'nome' => fake()->word()
        ];
    }
}
