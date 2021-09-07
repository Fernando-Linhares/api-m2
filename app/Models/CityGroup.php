<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \Illuminate\Database\Eloquent\Relations\HasMany;

class CityGroup extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];
    /**
     * Get all of the cities for the CityGroup
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function cities(): HasMany
    {
        return $this->hasMany(City::class, 'id', 'group');
    }
}
