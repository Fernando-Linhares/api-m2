<?php

namespace Database\Seeders;

use App\Models\ProductDiscount;
use Illuminate\Database\Seeder;

class ProductDiscountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProductDiscount::factory(5)->create();
    }
}
