<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Day extends Model
{
    use HasFactory;

    protected $guarded = [];


    public function schedules()
    {
        return $this->belongsToMany(Schedule::class, 'day_schedules')->withPivot("start_time");
    }

}

