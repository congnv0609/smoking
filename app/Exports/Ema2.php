<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class Ema2 implements FromCollection, WithHeadings, WithTitle, ShouldAutoSize
{

    private $_headings = [];

    private $_withoutColumns = ['id', 'created_at', 'updated_at'];

    /**
     * @return string
     */
    public function title(): string
    {
        return 'EMA 2';
    }

    public function headings(): array
    {
        $this->getFirst();
        return $this->_headings;
    }


    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $list = DB::Table('smokers')
        ->join('ema2s', 'smokers.id', '=', 'ema2s.account_id')
        ->select(DB::raw('if(smokers.term > 1, concat(smokers.account,"-",smokers.term), smokers.account) as account'), 'ema2s.*')
        ->get();
        $list->transform(function ($i) {
            foreach ($i as $key => $col) {
                if (in_array($key, $this->_withoutColumns)) {
                    unset($i->$key);
                }
            }
            return $i;
        });
        return $list;
    }

    private function getFirst()
    {
        $row = DB::Table('smokers')
        ->join('ema2s', 'smokers.id', '=', 'ema2s.account_id')
        ->select(DB::raw('if(smokers.term > 1, concat(smokers.account,"-",smokers.term), smokers.account) as account'), 'ema2s.*')
        ->first();
        if (!empty($row)) {
            $cols = array_keys(get_object_vars($row));
            foreach ($cols as $key => $col) {
                if (in_array($col, $this->_withoutColumns)) {
                    unset($cols[$key]);
                }
            }
            $this->_headings = $cols;
        }
    }


}
