<?php

namespace App\Models\Seguranca;

use App\Models\Seguranca\Usuario;

class UsuarioDB 
{
    public static function grid(object $data)
    {
        // $query = Usuario::select('id', 'nome', 'email')->paginate();
        $query = Usuario::query();

        if(isset($data->nome)) {
            $query->where('nome', 'like', '%' . $data->nome . '%');
        }

        $dados = $query->get(['id', 'nome', 'email']);

        return $dados;
    }
}
