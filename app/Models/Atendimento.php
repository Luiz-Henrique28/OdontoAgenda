<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Atendimento extends Model
{
    use HasFactory;

    const CREATED_AT = 'criado_em';
    const UPDATED_AT = 'atualizado_em';

    protected $fillable = [
        'paciente_id',
        'dentista_id',
        'tipo',
        'descricao',
        'data_inicio',
        'data_fim',
        'status',
        'observacoes'
    ];

    protected function casts(): array
    {
        return [
            'data_inicio' => 'datetime',
            'data_fim' => 'datetime',
            'criado_em' => 'datetime',
            'atualizado_em' => 'datetime'
        ];
    }

    public function paciente()
    {
        return $this->belongsTo(Paciente::class, 'paciente_id');
    }

    public function dentista()
    {
        return $this->belongsTo(Dentista::class, 'dentista_id');
    }
}
