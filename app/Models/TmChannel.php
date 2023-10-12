<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TmChannel extends Model
{
    use HasFactory;
    protected $fillable = [
        'campaign_id',
        'country_id',
        'channel',
        'channel_description',
        'created_by',
    ];
}
