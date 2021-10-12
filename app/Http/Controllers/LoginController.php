<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Smoker;

class LoginController extends Controller
{

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([]);
        }

        return response()->json(['token' => $user->createToken($request->email)->plainTextToken, 'type' => 'Bearer']);
    }

    public function login1(Request $request)
    {
        $request->validate([
            'account' => 'required',
        ]);

        $account = $request->account;

        $smoker = Smoker::where('account', $account)->first();

        if (!$smoker) {
            throw ValidationException::withMessages([
                'account' => ['The provided credentials are incorrect.'],
            ]);
        }

        return response()->json(['token' => $smoker->createToken($request->account)->plainTextToken, 'type' => 'Bearer']);
    }
}
