<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Dentista>
 */
class DentistaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nome' => $this->faker->name,
            'especialidade' => $this->faker->randomElement(['Ortodontia', 'Endodontia', 'Periodontia', 'Cirurgia']),
            'telefone' => $this->faker->phoneNumber,
            'email' => $this->faker->unique()->safeEmail,
            'criado_em' => now(),
            'atualizado_em' => now(),
        ];
    }
}
