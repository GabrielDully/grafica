<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;

class UsuarioEmpresa extends Model implements Authenticatable
{
    use AuthenticatableTrait;

    protected $table = 'usuario_empresa';

    protected $fillable = [
        'cnpj',
        'email',
        'password',
    ];

}
