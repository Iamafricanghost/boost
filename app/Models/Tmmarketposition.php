<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tmmarketposition extends Model
{
    use HasFactory;
    protected $fillable = [
        'sku_id','position'
    ];
}
