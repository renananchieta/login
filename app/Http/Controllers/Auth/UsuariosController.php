<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Seguranca\Usuario;
use App\Models\Seguranca\UsuarioDB;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

    public function store(Request $request)
    {
        $data = (Object)$request->all();

        try{
            DB::beginTransaction();
            
            $usuario = Usuario::create($data);

            DB::commit();
            
            return response($usuario);
        }catch(Exception $e){
            DB::rollBack();

            return response(['message' => $e->getMessage()], 400);
        }
    }
}
