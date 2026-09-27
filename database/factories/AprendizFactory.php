<?php

namespace Database\Factories;

use App\Models\Aprendiz;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Aprendiz>
 */
class AprendizFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'documento' => $this->faker->unique()->numerify('100#######'),
            'nombre' => $this->faker->firstName(),
            'apellido' => $this->faker->lastName(),
            'email' => $this->faker->unique()->safeEmail(),
            'telefono' => $this->faker->phoneNumber(),
            'ficha' => '2671448',
            'estado' => $this->faker->randomElement(['en_formacion', 'retirado', 'graduado']),
        ];
    }
}
