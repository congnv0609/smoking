<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use App\Models\Smoker;

class SmokerController extends Controller
{

    /**
     * @queryParam token required 5 digits use to login, add to header
     */
    public function test() {
        return response()->json(['message'=> 'already login'], 200);
    }


}
