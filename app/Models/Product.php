<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'description', 'bricks_amount', 'set_number', 'category', 'price', 'max_weeks', 'length', 'width', 'height', 'spotlight', 'quantity', 'security_stock','barcode',
    ];
}
