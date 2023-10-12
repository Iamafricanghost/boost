<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tmcompetitor extends Model
{
    use HasFactory;
    protected $fillable = [
        'campaign_id',
        'competitor_name',
        'competitor_brief',
    ];
}
