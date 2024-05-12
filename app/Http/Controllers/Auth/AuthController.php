<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Seguranca\Usuario;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();

        return response()->json([
            'message' => 'Success',
        ]);
    }
    
    public function info(Request $request)
    {
        $user = $request->user();

        return response($user);
    }

    public function login(Request $request)
    {
        $usuario = Usuario::where('email', $request->email)->first();

        if(! $usuario || ! Hash::check($request->senha, $usuario->senha)) {
            throw ValidationException::withMessages([
                    'email' => ['Credenciais inválidas.'],
            ]);
        }

        $usuario->tokens()->delete();

        $token = $usuario->createToken($request->device_name)->plainTextToken;

        return response()->json([
            'token' => $token,
            'id' => $usuario->id,
            'nome' => $usuario->nome,
            'email' => $usuario->email,
        ]);
    }
}
