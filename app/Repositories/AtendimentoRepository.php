<?php
namespace App\Repositories;

use App\Models\Atendimento;

class AtendimentoRepository
{
    public function getAll()
    {
        return Atendimento::with(['paciente', 'dentista'])->get();
    }

    public function findById($id)
    {
        return Atendimento::with(['paciente', 'dentista'])->findOrFail($id);
    }

    public function create(array $data)
    {
        return Atendimento::create($data);
    }

    public function update($id, array $data)
    {
        $atendimento = $this->findById($id);
        $atendimento->update($data);
        return $atendimento;
    }

    public function delete($id)
    {
        $atendimento = $this->findById($id);
        return $atendimento->delete();
    }

    public function getAtendimentosPorData($dataInicio)
    {
        return Atendimento::with(['paciente', 'dentista'])
            ->where('data_inicio', '>=', $dataInicio)
            ->orderBy('data_inicio', 'asc')
            ->get();
    }
}
