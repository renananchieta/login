<?php

namespace App\Models\Facade;

use App\Models\Estudantes\Estudantes;

class EstudantesDB 
{
    public static function gridEstudantes($parametros)
    {
        $query = Estudantes::query();

        if(isset($parametros->nome)) $query->where('nome', 'like', '%' . $parametros->nome . '%');

        if(isset($parametros->cpf)) $query->where('cpf', '=', $parametros->cpf);

        if(isset($parametros->nome_mae)) $query->where('nome_mae', 'like', '%' . $parametros->nome_mae . '%');

        if(isset($parametros->cpf_mae)) $query->where('cpf_mae', '=', $parametros->cpf_mae);

        if(isset($parametros->dt_nascimento)) $query->where('dt_nascimento', '=', $parametros->dt_nascimento);

        return $query->get();
    }
}
