<?php

namespace App\Services;

use App\Repositories\PacienteRepository;

class PacienteService
{
    private $pacienteRepository;

    public function __construct(PacienteRepository $pacienteRepository)
    {
        $this->pacienteRepository = $pacienteRepository;
    }

    public function listarPacientes()
    {
        return $this->pacienteRepository->getAll();
    }

    public function criarPaciente(array $data)
    {
        return $this->pacienteRepository->create($data);
    }

    public function atualizarPaciente($id, array $data)
    {
        return $this->pacienteRepository->update($id, $data);
    }

    public function excluirPaciente($id)
    {
        return $this->pacienteRepository->delete($id);
    }
}
