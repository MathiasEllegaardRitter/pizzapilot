<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \Illuminate\Database\Eloquent\Relations;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Ingredient_product extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function products(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }









}
