<?php

namespace App\Http\Controllers\Cms;

use App\Exports\Export;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

class ExportController extends Controller
{
    //
    public function export(){
        return Excel::download(new Export, 'EmaUser.xlsx');
    }
}
