<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'is_active',
        'is_shutdown',
        'description',
        'goal_description',
        'start_date',
        'end_date'
    ];
}
