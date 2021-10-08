<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use App\Models\Smoker;

class SmokerController extends Controller
{
    
    public function login(Request $request)
    {
        $account = $request->account;
        $smoker = Smoker::where('account', $account)->first();

        if (!$smoker) {
            throw ValidationException::withMessages([
                'account' => ['The provided credentials are incorrect.'],
            ]);
        }

        if (!$smoker->tokens()->where('name', $request->account)->first()) {
            return ['token' => $smoker->createToken($request->account)->plainTextToken, 'token_type' => 'Bearer'];
        }

        return ['token' => $smoker->plainTextToken($request->account), 'token_type' => 'Bearer'];
    }

}
