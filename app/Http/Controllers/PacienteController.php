<?php

namespace App\Http\Controllers;

use App\Models\Paciente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PacienteController extends Controller
{
    public function __construct()
    {}

    public function index(){

    }

    
    public function show($id){
        $paciente = Paciente::findOrFail($id);
        return view('pacientes', compact('paciente'));
    }

    public function update(Request $dados){


        redirect();
    }
}
