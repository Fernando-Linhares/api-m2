<?php

namespace Database\Seeders;

use App\Models\CityState;
use Illuminate\Database\Seeder;

class CityStateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CityState::factory(5);
    }
}
