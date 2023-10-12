<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Productsku extends Model
{
    use HasFactory;
    protected $fillable = [
        'variant_id',
        'product_sku',
        'photo',
        'created_by',
    ];
}
