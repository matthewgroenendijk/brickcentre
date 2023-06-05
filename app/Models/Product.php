<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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

    public function images()
    {
        return $this->hasMany('App\Image', 'product_id');
    }
}
