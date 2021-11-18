<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use App\Http\Traits\EmaTrait;
use Illuminate\Http\Request;

class EmaController extends Controller
{
    use EmaTrait;
    //
    public function index(){
        $emaId = request()->input('ema');
        $size = request()->input('size')??15;
        $list = $this->getEmaList($emaId, $size);
        return response()->json($list, 200);
    }
}
