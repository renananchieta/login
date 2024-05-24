<?php

namespace App\Models\Frequencia;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Frequencia extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table="frequencia_estudante";
    protected $fillable = [
        'matricula_id',
        'ano_referencia',
        'mes_referencia',
        'ch_ofertada',
        'ch_presente',
    ];
}
