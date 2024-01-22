<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function products()
    {
        return $this->belongsToMany(Product::class, 'menu_products');
    }

    public function pizza_stores()
    {
        return $this->hasMany(Menu::class, 'pizza_stores_id');
    }
}
