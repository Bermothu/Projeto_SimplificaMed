<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consulta extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'user_id', 'idade', 'descricao', 'data', 'horario', 'status'];

    public function user()
    {
        return $this->belongsTo(User::class); // Relacionamento de muitos para um
    }
}

// <!-- OS MODELS ESTABELECEM A COMUNICAÇÃO DO BANCO COM A NOSSA APLICAÇÃO POR MEIO DA ORM ELOQUENT! -->