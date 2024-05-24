<?php

namespace App\Models\Frequencia;

class FrequenciaDB
{
    public static function gridFrequenciaEstudante(Object $parametros)
    {
        $query = Frequencia::query();

        if(isset($parametros->matricula_id)) $query->where('matricula_id', $parametros->matricula_id);

        if(isset($parametros->ano_referencia)) $query->where('ano_referencia', $parametros->matricula_id);
        
        if(isset($parametros->mes_referencia)) $query->where('mes_referencia', $parametros->matricula_id);

        $query->get();

        return $query;
    }
}
