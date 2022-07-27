<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cadastro extends Model
{
    use HasFactory;
    protected $table = 'cadastro_usuarios';

    protected $fillable=['nome', 'sobreNome','email','telefone','endereco','idade','msg'];
}
