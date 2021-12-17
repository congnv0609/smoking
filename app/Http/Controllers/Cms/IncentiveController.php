<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use App\Models\Incentive;
use Illuminate\Http\Request;

class IncentiveController extends Controller
{
    //
    public function list()
    {
        $list = [];
        $size = request()->input('size');
        $query = request()->query();
        $account_id = $query['account_id'] ?? null;
        $sort = explode(',', $query['sort']);
        $list = Incentive::where(function ($query) use ($account_id) {
            if (!empty($account_id)) {
                $query->where('account_id', 'like', '%' . $account_id . '%');
            }
        })->orderBy($sort[0], $sort[1])->paginate($size)->withQueryString();
        return response()->json($list, 200);
    }
}
