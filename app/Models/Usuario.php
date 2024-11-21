<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Authenticatable
{
    use HasFactory;
    protected $table = 'usuarios';

    const CREATED_AT = 'criado_em';
    const UPDATED_AT = 'atualizado_em';

    protected $fillable = [
        'nome',
        'email',
        'senha',
        'papel',
    ];

    public $timestamps = false;

    protected $hidden = [
        'senha',
    ];

    protected function casts(): array
    {
        return [
            'senha' => 'hashed',
            'criado_em' => 'datetime',
            'atualizado_em' => 'datetime'
        ];
    }


    /**
     * Get the password for the user.
     *
     * @return string
     */
    public function getAuthPassword()
    {
        return $this->senha;
    }
}
