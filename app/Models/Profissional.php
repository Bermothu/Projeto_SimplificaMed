<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profissional extends Model
{

    use HasFactory;
    protected $fillable = [
        'name', 'cpf', 'telefone','endereco', 'tipo',
    ];

    public function consultas(){
        return $this->hasMany(ProfissionalConsulta::class);
    }


}
