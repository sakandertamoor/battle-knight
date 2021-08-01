<?php

namespace Database\Factories;
use App\Models\Knight;
use App\Models\Battles;
use Illuminate\Database\Eloquent\Factories\Factory;

class BattlesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Battles::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'player_id' => Knight::factory(),
            'opponent_id' => Knight::factory(),
            'winner_id' =>   Knight::factory()
        ];
    }
}
