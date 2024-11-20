<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Paciente extends Model
{
    use HasFactory;

    const CREATED_AT = 'criado_em';
    const UPDATED_AT = 'atualizado_em';

    protected $fillable = [
        'nome',
        'data_nascimento',
        'telefone',
        'email',
        'endereco',
        'historico_medico'
    ];

    protected function casts(): array
    {
        return [
            'criado_em' => 'datetime',
            'atualizado_em' => 'datetime'
        ];
    }

    public function atendimentos()
    {
        return $this->hasMany(Atendimento::class, 'paciente_id');
    }
}
