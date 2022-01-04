<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ema4 extends Model
{
    use HasFactory;
    
    protected $guarded = [];

    protected $casts = [
        'attempt_time' => 'datetime:Y-m-d H:i',
        'submit_time' => 'datetime:Y-m-d H:i',
        'popup_time' => 'datetime:Y-m-d H:i',
        'popup_time1' => 'datetime:Y-m-d H:i',
        'popup_time2' => 'datetime:Y-m-d H:i',
    ];

    // public function setSubmitTimeAttribute($submit_time)
    // {
    //     $this->attributes['submit_time'] = $submit_time;
    //     $this->attributes['time_taken'] =
    //     date_diff($submit_time, $this->attempt_time)->format('%i');
    // }
}
