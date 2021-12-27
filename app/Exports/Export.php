<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class Export implements WithMultipleSheets
{
    use Exportable;

    /**
     * @return array
     */
    public function sheets(): array
    {
        $sheets = [];

        $sheets[] = new User();
        $sheets[] = new Incentive();
        $sheets[] = new Waketime();
        $sheets[] = new Ema1();
        $sheets[] = new Ema2();
        $sheets[] = new Ema3();
        $sheets[] = new Ema4();
        $sheets[] = new Ema5();

        return $sheets;
    }
}
