<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Paciente;
use App\Models\Dentista;
use App\Models\Atendimento;


class AtendimentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Garantir que existam pacientes e dentistas antes de criar os atendimentos
        $pacientes = Paciente::all();
        $dentistas = Dentista::all();

        Atendimento::factory()->count(50)->create([
            'paciente_id' => $pacientes->random()->id,
            'dentista_id' => $dentistas->random()->id,
        ]);
    }
}
