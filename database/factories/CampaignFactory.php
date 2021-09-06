<?php

namespace Database\Factories;

use App\Models\Campaign;
use Illuminate\Database\Eloquent\Factories\Factory;

class CampaignFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Campaign::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'=>$this->faker->name(),
            'is_active'=>false,
            'is_shutdown'=>false,
            'description'=>$this->faker->sentence(),
            'goal_description'=>$this->faker->sentence(),
            'start_date'=>now(),
            'end_date'=>now(),
        ];
    }
}
