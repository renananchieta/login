<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Seguranca\UsuarioDB;
use Exception;
use Illuminate\Http\Request;

class UsuariosController extends Controller
{
    public function grid(Request $request)
    {
        $data = (Object)$request->all();
        try {
            $usuarios = UsuarioDB::grid($data);

            return response( $usuarios, 200);
        } catch(Exception $e) {
            return response([
                'erro' => 'Falha ao realizar esta operação.'
            ], 500);
        }
    }
}
