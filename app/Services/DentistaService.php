<?php
namespace App\Services;

use App\Models\Dentista;
use App\Repositories\DentistaRepository;

class DentistaService
{

    private $dentistaRepository;

    public function __construct(DentistaRepository $dentistaRepository)
    {
        $this->dentistaRepository = $dentistaRepository;
    }

    public function listarDentistas()
    {
        return $this->dentistaRepository->getAll();
    }

    public function excluirPaciente($id)
    {
        return $this->dentistaRepository->delete($id);
    }
}
