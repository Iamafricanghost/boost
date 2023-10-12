<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tmpartnership extends Model
{
    use HasFactory;
    protected $fillable = ['competitor_id','partner','description','company_name'];
}
