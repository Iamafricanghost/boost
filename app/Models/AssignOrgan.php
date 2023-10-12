<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssignOrgan extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_id','created_by','organ_id'
    ];
}
