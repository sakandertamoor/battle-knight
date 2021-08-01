<?php

namespace Database\Factories;

use App\Models\Virtue;
use Illuminate\Database\Eloquent\Factories\Factory;

class VirtueFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Virtue::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->randomElement(['Courage', 'Justice', 'Faith'])
        ];
    }
}
