<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;

class Ema5Personal implements FromCollection, WithHeadings, WithTitle, WithColumnFormatting, ShouldAutoSize
{

    private $_headings = [];

    private $_withoutColumns = ['id', 'account_id', 'nth_popup', 'popup_time1', 'popup_time2', 'created_at', 'updated_at'];

    private $_accountId = null;

    public function __construct($accountId)
    {
        $this->_accountId = $accountId;
    }

    /**
     * @return string
     */
    public function title(): string
    {
        return 'Ema 5';
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
        return $this->makeList();
    }

    private function makeList()
    {
        $list = DB::Table('smokers')->where('smokers.id', $this->_accountId)
            ->join('ema5s', 'smokers.id', '=', 'ema5s.account_id')
            ->select(DB::raw('if(smokers.term > 1, concat(smokers.account,"-",smokers.term), smokers.account) as user_id'), 'ema5s.*')
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
            ->join('ema5s', 'smokers.id', '=', 'ema5s.account_id')
            ->select(DB::raw('if(smokers.term > 1, concat(smokers.account,"-",smokers.term), smokers.account) as user_id'), 'ema5s.*')
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

    public function columnFormats(): array
    {
        return [
            'A' => NumberFormat::FORMAT_TEXT,
        ];
    }
}
