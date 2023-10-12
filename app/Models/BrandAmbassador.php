<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BrandAmbassador extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'gender',
        'phone',
        'phone_type',
        'age',
        'look_feel',
        'id_number',
        'residence',
        'english_fluency',
        'languages',
        'education_level',
        'work_experience',
        'transferable_skills',
        'reporting_capability',
        'role_applied_for',
        'expected_salary',
        'recommendation',
        'remarks',
        'general_rating',
        'photo',
        'created_by',
    ];
}
