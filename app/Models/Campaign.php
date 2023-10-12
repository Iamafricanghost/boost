<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    use HasFactory; 
    protected $fillable =[
        'campaign_name',
        'customer_id',
        'campaign_lead',
        'campaign_brief',
        'campaign_start',
        'campaign_approx_end',
        'created_by',
    ];
}
