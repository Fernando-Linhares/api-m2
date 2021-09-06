<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
       $this->call([
           CampaignSeeder::class,
           CityCountrySeeder::class,
           CityGroupSeeder::class,
           CitySeeder::class,
           CityStateSeeder::class,
           ProductCategorySeeder::class,
           ProductSeeder::class,
           ProductDiscountSeeder::class
       ]);
    }
}
