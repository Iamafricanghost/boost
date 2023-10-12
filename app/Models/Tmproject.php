<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tmproject extends Model
{
    use HasFactory;
    protected $fillable =[
        'project_name',
        'customer_id',
        'project_lead',
        'created_by',
        'project_brief',
    ];
}
