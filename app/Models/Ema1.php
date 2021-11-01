<?php

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ema1 extends Model
{
    use HasFactory;
    
    protected $guarded = [];

    protected $casts = [
        'attempt_time' => 'datetime',
        'submit_time' => 'datetime',
    ];

    // public function setTimeTakenAttribute($submit_time)
    // {
    //     $this->attributes['time_taken'] =
    //     date_diff($submit_time, $this->attempt_time);
    // }

    // public function getTimeTakenAttribute()
    // {
    //     return date_diff($this->submit_time, $this->attempt_time)['i'];
    // }
}
