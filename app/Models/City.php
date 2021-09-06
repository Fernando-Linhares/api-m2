<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \Illuminate\Database\Eloquent\Relations\HasOne;
class City extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'state_id',
        'country_id'
    ];

    /**
     * Get the state associated with the City
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function cityState(): HasOne
    {
        return $this->hasOne(CityState::class, 'state_id', 'id');
    }

    /**
     * Get the county associated with the City
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function cityCounty(): HasOne
    {
        return $this->hasOne(CityCountry::class, 'county_id', 'id');
    }
}
