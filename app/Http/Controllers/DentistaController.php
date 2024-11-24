<?php

namespace App\Http\Controllers;

use App\Models\Dentista;
use Illuminate\Http\Request;
use App\Services\DentistaService;

class DentistaController extends Controller
{

    private $dentistaService;

    public function __construct(DentistaService $dentistaService)
    {
        $this->dentistaService = $dentistaService;
    }

    public function index()
    {
        $dentistas = $this->dentistaService->listarDentistas();
        return view('index/dentistas', compact('dentistas'));
    }

    public function create()
    {
        return view('create/dentista');
    }

    public function store(Request $dados)
    {
        $validated = $dados->validate([
            'nome' => 'required|string|max:100',
            'especialidade' => 'nullable|string|max:100',
            'telefone' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:100|unique:dentistas,email',
        ]);

        Dentista::create($validated);

        return redirect()->route('dentistas.index')
            ->with('success', 'Paciente cadastrado com sucesso!');
    }

    public function show($id)
    {
        $dentista = Dentista::findOrFail($id);
        return view('edit/dentista', compact('dentista'));
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

        $paciente = Dentista::findOrFail($id);
        $paciente->update($dadosValidados);

        return redirect()
            ->route('dentistas.index')
            ->with('success', 'Dentista atualizado com sucesso!');
    }

    public function destroy($id)
    {
        $this->dentistaService->excluirPaciente($id);
        return redirect()
            ->route('dentistas.index')
            ->with('success', 'Dentista excluído com sucesso!');
    }
}
