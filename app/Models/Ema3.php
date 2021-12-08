<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ema3 extends Model
{
    use HasFactory;
    
    protected $guarded = [];

    protected $casts = [
        'attempt_time' => 'datetime',
        'submit_time' => 'datetime',
    ];

    public function smokers()
    {
        return $this->hasOne(Smoker::class, 'id', 'account_id');
    }

    // public function setSubmitTimeAttribute($submit_time)
    // {
    //     $this->attributes['submit_time'] = $submit_time;
    //     $this->attributes['time_taken'] =
    //     date_diff($submit_time, $this->attempt_time)->format('%i');
    // }
}
