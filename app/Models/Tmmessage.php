<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tmmessage extends Model
{
    use HasFactory;

    protected $fillable = [
        'sku_id','message','tone','company_name'
    ];
}
