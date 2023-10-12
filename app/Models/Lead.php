<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    use HasFactory;
    protected $fillable = [
            'lead_name',
            'office_address',
            'contact_name',
            'contact_level',
            'contact_phone',
            'contact_email',
            'lead_type',
            'employee_handling',
            'created_by',
];
}
