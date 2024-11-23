<?php

namespace App\Services;

use App\Repositories\AtendimentoRepository;

class AtendimentoService
{
    private $atendimentoRepository;

    public function __construct(AtendimentoRepository $atendimentoRepository)
    {
        $this->atendimentoRepository = $atendimentoRepository;
    }

    public function listarAtendimentos()
    {
        return $this->atendimentoRepository->getAll();
    }

    public function criarAtendimento(array $data)
    {
        return $this->atendimentoRepository->create($data);
    }

    public function atualizarAtendimento($id, array $data)
    {
        return $this->atendimentoRepository->update($id, $data);
    }

    public function excluirAtendimento($id)
    {
        return $this->atendimentoRepository->delete($id);
    }

    public function listarAtendimentosPorData($dataInicio)
    {
        return $this->atendimentoRepository->getAtendimentosPorData($dataInicio);
    }
}
