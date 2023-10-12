<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $fillable = [
        'customer_name',
        'office_address',
        'tin',
        'contact_name',
        'contact_level',
        'contact_phone',
        'contact_email',
        'account_manager',
        'created_by',
    ];
}
