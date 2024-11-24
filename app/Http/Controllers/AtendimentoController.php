<?php

namespace App\Http\Controllers;

use App\Services\AtendimentoService;
use Illuminate\Http\Request;

class AtendimentoController extends Controller
{

    private AtendimentoService $atendimentoService;

    public function __construct(AtendimentoService $atendimentoService)
    {
        $this->atendimentoService = $atendimentoService;
    }


    public function index()
    {
        $atendimentos = $this->atendimentoService->listarAtendimentos();
        return view('index/atendimentos', compact($atendimentos));
    }

}
