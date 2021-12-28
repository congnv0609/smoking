<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use App\Models\WakeTime as ModelsWakeTime;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

class Waketime implements FromCollection, WithHeadings, WithTitle, ShouldAutoSize
{

    public function headings(): array
    {
        return [
            'user_id',
            'date_of_change',
            'time_of_change',
            'old_wake',
            'new_wake',
        ];
    }

    /**
     * @return string
     */
    public function title(): string
    {
        return 'Wake time';
    }

    public function columnFormats(): array
    {
        return [
            'A' => NumberFormat::FORMAT_TEXT,
        ];
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $list = DB::Table('smokers')
        ->join('wake_times', 'smokers.id', '=', 'wake_times.account_id')
        ->select(DB::raw('if(smokers.term > 1, concat(smokers.account,"-",smokers.term), smokers.account) as account'), 'wake_times.data_of_change', 'wake_times.updated_at', 'wake_times.old_wake', 'wake_times.new_wake')
        ->get();
        return $list;
    }
}
