<?php
namespace App\Repositories;

use App\Models\Paciente;

class PacienteRepository
{
    public function getAll()
    {
        return Paciente::all()->toArray();
    }

    public function findById($id)
    {
        return Paciente::findOrFail($id);
    }

    public function create(array $data)
    {
        return Paciente::create($data);
    }

    public function update($id, array $data)
    {
        $paciente = $this->findById($id);
        $paciente->update($data);
        return $paciente;
    }

    public function delete($id)
    {
        $paciente = $this->findById($id);
        return $paciente->delete();
    }
}


