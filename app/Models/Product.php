<?php

namespace App\Models;

use App\Models\Image;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    protected $table = 'products';

    protected $fillable = [
        'name', 
        'description', 
        'bricks_amount', 
        'set_number', 
        'category', 
        'price', 
        'max_weeks', 
        'length', 
        'width', 
        'height', 
        'spotlight', 
        'quantity', 
        'security_stock',
        'barcode',
    ];
    // add images to the product model as a relationship 
    public function images(): HasMany
    {
        return $this->hasMany(Image::class, 'product_id', 'id');
    }
}
