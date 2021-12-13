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
        $accountId = request()->input('account')??0;
        $list = $this->getEmaList($emaId, $accountId, $size);
        return response()->json($list, 200);
    }
}
