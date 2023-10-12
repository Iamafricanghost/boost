<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Productvariant extends Model
{
    use HasFactory;
    protected $fillable = [
        'brand_id',
        'product_variant',
        'created_by',
    ];
}
