<?php

namespace App\Http\Controllers;

use App\Http\Middleware\Smoking;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Smoker;
use PhpOption\Some;

class LoginController extends Controller
{

    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth', ['except' => ['login']]);
    }


    /**
     * @bodyParam email string required email use to login
     * @queryParam password required password use to login
     */
    public function login(Request $request)
    {
        $credentials = request(['email', 'password']);

        if (!$token = auth('backend')->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $this->respondWithToken($token);
    }

    /**
     * @bodyParam account number required 5 digits number use to login
     */
    public function login1(Request $request)
    {
        $request->validate([
            'account' => 'required',
        ]);

        $account = $request->account;

        $term = Smoker::where('account', $account)->max('term');

        $smoker = new Smoker();
        $smoker->account = $account;
        $smoker->term = $term + 1;
        $smoker->save();

        return response()->json(['data' => $smoker], 200);
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        return response()->json(auth()->user());
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }
}
