<?php

namespace Database\Factories;

use App\Models\Knight;
use Illuminate\Database\Eloquent\Factories\Factory;

class KnightFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Knight::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'age' => rand(20,25),
            'health' => rand(50,90),
            'courage' => rand(50,90),
            'justice' => rand(50,90),
            'mercy' => rand(50,90),
            'generosity' => rand(50,90),
            'faith' => rand(50,90),
            'strength' => rand(50,90),
            'defense' => rand(50,90),
            'strategy' => rand(50,90),
        ];
    }
}
