<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tmcompetitoroffering extends Model
{
    use HasFactory;
    protected $fillable = [
        'competitor_id',
        'sku_name',
        'photo',
        'sku_brief',
        'company_name',
    ];
}
