<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tmstrategy extends Model
{

    use HasFactory;
    protected $fillable = ['competitor_id','strategy','description','company_name'];
}
