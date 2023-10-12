<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SisterCompany extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_name',
        'office_address',
        'tin',
        'contact_name',
        'contact_level',
        'contact_phone',
        'contact_email',
        'relation_type',
        'created_by',
    ];
}
