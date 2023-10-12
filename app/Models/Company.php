<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    protected $fillable = [
        'created_by',
        'country_id',
        'company_name',
        'legal_type',
        'company_email',
        'company_phone',
        'tin',
        'address',
        'logo',
    ];
}
