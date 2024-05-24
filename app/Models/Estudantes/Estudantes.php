<?php

namespace App\Models\Estudantes;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Estudantes extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = "estudantes";
    protected $fillable = [
        'nome',
        'cpf',
        'dt_nascimento',
        'nome_mae',
        'cpf_mae',
    ];
}
