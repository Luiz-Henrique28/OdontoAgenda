<?php

namespace App\Http\Controllers;

use App\Models\Paciente;
use App\Services\PacienteService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PacienteController extends Controller
{
    private $pacienteService;

    public function __construct(PacienteService $pacienteService)
    {
        $this->pacienteService = $pacienteService;
    }

    public function index()
    {
        $pacientes = $this->pacienteService->listarPacientes();
        return view('index/pacientes', compact('pacientes'));
    }

    //metodo show/edit duas funcionalidades em uma so rota
    public function show($id)
    {
        $paciente = Paciente::findOrFail($id);
        return view('edit/paciente', compact('paciente'));
    }

    public function create()
    {
        return view('create/paciente');
    }

    public function store(Request $dados)
    {
        $validated = $dados->validate([
            'nome' => 'required|string|max:100',
            'data_nascimento' => 'required|date',
            'telefone' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:100|unique:pacientes,email',
            'endereco' => 'nullable|string',
            'historico_medico' => 'nullable|string',
        ]);

        Paciente::create($validated);

        return redirect()->route('dentistas.index')
            ->with('success', 'Paciente cadastrado com sucesso!');
    }

    public function update(Request $dados, $id)
    {

        $dadosValidados = $dados->validate([
            'nome' => 'required|string|max:100',
            'telefone' => 'nullable|string|max:20',
            'email' => 'required|email|max:100|unique:usuarios,email,' . $id,
            'endereco' => 'nullable|string',
            'historico_medico' => 'nullable|string',
        ]);

        $paciente = Paciente::findOrFail($id);
        $paciente->update($dadosValidados);

        return redirect()
            ->route('dashboard')
            ->with('success', 'Usuário atualizado com sucesso!');
    }

    public function destroy($id)
    {
        $this->pacienteService->excluirPaciente($id);
        return redirect()
            ->route('dashboard')
            ->with('success', 'Recurso excluído com sucesso!');
    }
}
