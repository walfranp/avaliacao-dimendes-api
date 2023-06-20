<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserLoginRequest;
use App\Http\Requests\UserRegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsuarioController extends Controller
{
    public function login(UserLoginRequest $userLoginRequest)
    {
        if (!auth()->attempt($userLoginRequest->all())) {
            return response()->json(['Error!' => 'Invalid credentials!'], 401);
        }

        return response()->json(['usuario' => auth()->user(), 'token' => auth()->user()->createToken('tasks')->accessToken], 200);
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
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        return response()->json($user, 200);
    }
}
