<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tmprice extends Model
{
    use HasFactory;
    protected $fillable = [
        'sku_id',
        'sku_price',
        'sku_strategy',
        'company_name',
    ];
}
