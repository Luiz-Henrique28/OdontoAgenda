<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Paciente;
use App\Models\Dentista;

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
            'paciente_id' => Paciente::inRandomOrder()->first()?->id,
            'dentista_id' => Dentista::inRandomOrder()->first()?->id,
            'tipo' => $this->faker->randomElement(['consulta', 'tratamento']),
            'descricao' => $this->faker->sentence,
            'data_inicio' => $this->faker->dateTimeBetween('now', '+30 days'),
            'data_fim' => $this->faker->optional()->dateTimeBetween('-2 months', '-1 days'),
            'status' => $this->faker->randomElement(['agendado', 'cancelado', 'concluido', 'andamento']),
            'observacoes' => $this->faker->optional()->text,
            'criado_em' => now(),
            'atualizado_em' => now(),
        ];
    }
}
