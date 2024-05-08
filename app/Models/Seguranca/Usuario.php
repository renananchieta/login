<?php

namespace App\Models\Seguranca;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Sanctum\HasApiTokens;

class Usuario extends Model
{
    use HasApiTokens, HasFactory;
    use SoftDeletes;
    protected $table = 'laravel.usuarios';
    protected $fillable = [
        'nome',
        'email',
        'senha',
    ];
}
