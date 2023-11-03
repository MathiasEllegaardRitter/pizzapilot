<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Schedule extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function breakes(): HasMany
    {
        return $this->hasMany(Breakes::class);
    }

    public function days()
    {
        return $this->belongsToMany(Day::class, 'day_schedules')->withPivot("start_time", "end_time", "is_special", "date");
    }
}
