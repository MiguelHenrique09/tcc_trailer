<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    //  nome da tabela
    protected $table = 'usuario';

    // chave primária personalizada
    protected $primaryKey = 'idUsuario';

    // campos que podem ser preenchidos
    protected $fillable = [
        'nome_usuario',
        'email',
        'password',
        'tipo_usuario'
    ];

    // campos ocultos
    protected $hidden = [
        'password',
        'remember_token',
    ];
    // casts
    protected function casts(): array
    {
        return [
            'password' => 'hashed',
        ];
    }

    //  método útil
    public function isAdmin()
    {
        return $this->tipo_usuario === 'Administrador';
    }
}