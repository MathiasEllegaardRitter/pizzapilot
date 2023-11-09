<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];
    
    public function ingredients()

    {
        return $this->belongsToMany(Ingredient::class, 'ingredient_products')->withPivot(['quantity'])->withTimestamps();
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }



    public function ingredient_product(): BelongsTo
    {
        return $this->belongsTo(Ingredient_product::class);
    }


    public function menus()
    {
        return $this->belongsToMany(Schedule::class, 'menu_product')->withPivot("name", "price", "description");
    }


}
