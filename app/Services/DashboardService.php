<?php

namespace App\Services;

use App\Repositories\PacienteRepository;
use App\Repositories\DentistaRepository;
use App\Repositories\AtendimentoRepository;
use Carbon\Carbon;

class DashboardService
{
    private $pacienteRepository;
    private $dentistaRepository;
    private $atendimentoRepository;

    public function __construct(
        PacienteRepository $pacienteRepository,
        DentistaRepository $dentistaRepository,
        AtendimentoRepository $atendimentoRepository
    ) {
        $this->pacienteRepository = $pacienteRepository;
        $this->dentistaRepository = $dentistaRepository;
        $this->atendimentoRepository = $atendimentoRepository;
    }

    public function getDashboardData()
    {
        return [
            'pacientes' => $this->pacienteRepository->getAll(),
            'totalPacientes' => count($this->pacienteRepository->getAll()),
            'totalDentistas' => $this->dentistaRepository->getAll()->count(),
            'consultasAgendadas' => $this->atendimentoRepository->getAtendimentosPorData(Carbon::now())->count(),
            'atendimentosProximos' => $this->atendimentoRepository->getAtendimentosPorData(Carbon::now())->toArray(),
        ];
    }
}

