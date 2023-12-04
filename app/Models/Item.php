<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function orders()
    {
        return $this->belongsToMany(Order::class, 'item_orders')->withPivot('quantity');
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }




}
