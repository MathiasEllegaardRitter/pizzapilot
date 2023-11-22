<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Customer extends Model
{
    use HasFactory;

    protected $guarded = [];

    // User has many orders
    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }

    // Customer belongs to one user
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // Customer has one delivery address
    public function deliveries(): BelongsToMany
    {
        return $this->belongsToMany(DeliveryAddress::class);
    }
}
