<?php

namespace App\Http\Controllers;

use App\Services\AtendimentoService;
use Illuminate\Http\Request;
use App\Models\Atendimento;
use App\Services\DentistaService;
use App\Services\PacienteService;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;
use App\Models\Paciente;
use App\Models\Dentista;

class AtendimentoController extends Controller
{

    private AtendimentoService $atendimentoService;
    private PacienteService $pacienteService;
    private DentistaService $dentistaService;

    public function __construct(
        AtendimentoService $atendimentoService,
        PacienteService $pacienteService,
        DentistaService $dentistaService
    ) {
        $this->atendimentoService = $atendimentoService;
        $this->pacienteService = $pacienteService;
        $this->dentistaService = $dentistaService;
    }


    public function index()
    {
        $atendimentos = $this->atendimentoService->listarAtendimentos();
        return view('index/atendimentos', compact('atendimentos'));
    }

    public function edit($id)
    {
        $atendimento = Atendimento::findOrFail($id);
        $pacientes = $this->pacienteService->listarPacientes();
        $dentistas = $this->dentistaService->listarDentistas();
        return view('edit/atendimento', compact('atendimento', 'pacientes', 'dentistas'));
    }

    public function update(Request $dados, $id)
    {
        try {
            $validatedData = $dados->validate([
                'paciente_id' => 'required|exists:pacientes,id',
                'dentista_id' => 'required|exists:dentistas,id',
                'tipo' => 'required|in:consulta,tratamento',
                'data_inicio' => 'required|date|before_or_equal:data_fim',
                'data_fim' => 'nullable|date|after_or_equal:data_inicio',
                'status' => 'required|in:agendado,cancelado,concluido,em andamento',
                'observacoes' => 'nullable|string|max:500',
            ]);

            $atendimento = Atendimento::findOrFail($id);
            $atendimento->update($validatedData);

            return redirect()
                ->route('atendimentos.index')
                ->with('success', 'Atendimento atualizado com sucesso!');
        } catch (ValidationException $e) {
            Log::error('Erro na validação:', $e->errors());
            return redirect()
                ->route('atendimentos.index')
                ->with('error', 'Erro na Edição do Atendimento!');
        }
    }

    public function create()
    {
        $pacientes = Paciente::all();
        $dentistas = Dentista::all();
        return view('create/atendimento', compact('pacientes', 'dentistas'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'paciente_id' => 'required|exists:pacientes,id', // Verifica se o paciente existe
            'dentista_id' => 'required|exists:dentistas,id', // Verifica se o dentista existe
            'tipo' => 'required|in:consulta,tratamento', // Tipo deve ser válido
            'data_inicio' => 'required|date|before_or_equal:data_fim', // Data de início obrigatória
            'data_fim' => 'nullable|date|after_or_equal:data_inicio', // Data de fim opcional
            'status' => 'required|in:agendado,cancelado,concluído,andamento', // Status permitido
            'observacoes' => 'nullable|string|max:500', // Observações opcionais
        ]);

        try {
            Atendimento::create($validatedData);
            
            return redirect()
                ->route('atendimentos.index')
                ->with('success', 'Atendimento criado com sucesso!');

        } catch (\Exception $e) {
           
            Log::error('Erro ao criar atendimento: ' . $e->getMessage());
            return redirect()
                ->route('atendimentos.index')
                ->with('error', 'Erro na criação do Atendimento!');
        }
    }


    public function destroy() {}
}
