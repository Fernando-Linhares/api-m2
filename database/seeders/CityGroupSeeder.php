<?php

namespace Database\Seeders;

use App\Models\CityGroup;
use Illuminate\Database\Seeder;

class CityGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CityGroup::factory(5)->create();
    }
}
