<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Makeup extends Model
{
    protected $fillable = [
        'product_name',
        'brand',
        'category',
        'shade',
        'price',
    ];
}
