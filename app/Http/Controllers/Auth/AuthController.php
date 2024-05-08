<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Seguranca\Usuario;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function auth(Request $request)
    {
        $user = User::where('email', $request->email)->first();

        if(! $user || ! Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                    'email' => ['Credenciais inválidas.'],
            ]);
        }

        $user->tokens()->delete();

        $token = $user->createToken($request->device_name)->plainTextToken;

        return response()->json([
            'token' => $token,
        ]);
    }

    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();

        return response()->json([
            'message' => 'Success',
        ]);
    }
    
    public function me(Request $request)
    {
        $user = $request->user();

        return response()->json([
            'me' => $user,
        ]);
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
        ]);
    } 
}
