<?php

namespace App\Repositories;

use App\Models\Dentista;

class DentistaRepository
{
    public function getAll()
    {
        return Dentista::all();
    }

    public function findById($id)
    {
        return Dentista::findOrFail($id);
    }

    public function create(array $data)
    {
        return Dentista::create($data);
    }

    public function update($id, array $data)
    {
        $dentista = $this->findById($id);
        $dentista->update($data);
        return $dentista;
    }

    public function delete($id)
    {
        $dentista = $this->findById($id);
        $dentista->atendimentos()->delete();
        return $dentista->delete();
    }
}
