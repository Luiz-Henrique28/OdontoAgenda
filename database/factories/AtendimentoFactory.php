<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Atendimento>
 */
class AtendimentoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'paciente_id' => null, // Será preenchido na Seeder para garantir relacionamentos
            'dentista_id' => null, // Será preenchido na Seeder para garantir relacionamentos
            'tipo' => $this->faker->randomElement(['consulta', 'tratamento']),
            'descricao' => $this->faker->sentence,
            'data_inicio' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'data_fim' => $this->faker->optional()->dateTimeBetween('now', '+1 year'),
            'status' => $this->faker->randomElement(['agendado', 'cancelado', 'concluido', 'em andamento']),
            'observacoes' => $this->faker->optional()->text,
            'criado_em' => now(),
            'atualizado_em' => now(),
        ];
    }
}
