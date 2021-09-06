<?php

namespace Database\Seeders;

use App\Models\CityCountry;
use Illuminate\Database\Seeder;

class CityCountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CityCountry::factory(5)->create();
    }
}
