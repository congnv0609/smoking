<?php

namespace App\Http\Controllers\Cms;

use App\Exports\EmaPersonal;
use App\Exports\Export;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

class ExportController extends Controller
{
    //
    public function export(){
        return Excel::download(new Export, 'EmaUser.xlsx');
    }

    public function exportPersonal(int $id)
    {
        return Excel::download(new EmaPersonal($id), 'EmaUser.xlsx');
    }
}
