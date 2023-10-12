<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tmtargetaudience extends Model
{
    use HasFactory;

    protected $fillable = [
        'competitor_id',
        'demographic',
        'preference',
        'company_name',
    ];
}
