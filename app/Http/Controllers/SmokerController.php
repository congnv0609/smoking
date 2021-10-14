<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use App\Models\Smoker;

class SmokerController extends Controller
{

    public function test() {
        return response()->json(['message'=> 'already login'], 200);
    }


}
