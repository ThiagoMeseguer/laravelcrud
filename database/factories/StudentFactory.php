<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Assist>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
                'dni' => fake()->randomNumber(8, true),
                'nombre' => fake()->firstname(),
                'apellido' => fake()->lastname(),
                'nacimiento' => fake()->dateTime(),
                'anio' => fake()->randomElement([1,2,3]),
        ];
    }
}