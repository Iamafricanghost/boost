<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TmProduct extends Model
{
    use HasFactory;
    protected $fillable = [
        'campaign_id',
        'sku_id',
        'created_by',
    ];
}
