<?php

namespace Database\Factories;

use App\Models\Knight;
use App\Models\KnightVirtue;
use App\Models\Skill;
use App\Models\Virtue;
use Illuminate\Database\Eloquent\Factories\Factory;

class KnightVirtueFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = KnightVirtue::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'knight_id' => Knight::factory(),
            'virtue_id' => Virtue::factory(),
            'value' =>  rand(50,80)
        ];
    }
}
