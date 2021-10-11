<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use App\Models\User;

class UserController extends Controller
{

    public function login(Request $request)
    {
        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }

        if (!$user->tokens()->where('name', $request->email)->first()) {
            return ['token' => $user->createToken($request->email)->plainTextToken, 'token_type' => 'Bearer'];
        }

        return ['token' => $user->plainTextToken($request->email), 'token_type' => 'Bearer'];
    }

    public function test(Request $request) {
        return response()->json([User::all()]);
    }

}
