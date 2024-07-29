<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Estudiantes;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Estudiantes>
 */
class EstudiantesFactory extends Factory
{
    protected $model = Estudiantes::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombres' => fake()->name(),
            'dni' => fake()->randomNumber(8, true)
        ];
    }
}
