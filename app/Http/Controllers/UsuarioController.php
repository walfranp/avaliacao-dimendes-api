<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsuarioController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $params = $request->all();

        if (auth()->attempt($params)) {

            $user = auth()->user();
            $token = $user->createToken('livros')->accessToken;

            return response()->json(['usuario' => auth()->user(), 'token' => $token], 200);
        } else {
            return response()->json(['Error!' => 'Invalid credentials!'], 401);
        }
    }

    public function logout()
    {
        $user = Auth::user();
        $user->token()->revoke();
        $user->token()->delete();

        return response()->json(['success' => 200], 200);
    }

    public function register(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        $user = User::create([
            'name' => $request->nome,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        return response()->json($user, 200);
    }
}
