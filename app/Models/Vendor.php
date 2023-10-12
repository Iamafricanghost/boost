<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    use HasFactory;
    protected $fillable=[
        'vendor_name',
        'office_address',
        'tin',
        'contact_name',
        'contact_level',
        'contact_phone',
        'contact_email',
        'account_manager',
        'company_name',
        'country_id',
        'service_type',
    ];
}
