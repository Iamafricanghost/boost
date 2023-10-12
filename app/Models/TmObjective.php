<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TmObjective extends Model
{
    use HasFactory;
    protected $fillable = [
        'campaign_id',
        'kpi_type',
        'objective',
        'description',
        'created_by',
    ];
}
