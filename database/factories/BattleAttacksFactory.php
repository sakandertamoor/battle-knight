<?php

namespace Database\Factories;
use App\Models\Knight;
use App\Models\BattleAttacks;
use App\Models\Battles;
use Illuminate\Database\Eloquent\Factories\Factory;

class BattleAttacksFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = BattleAttacks::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'battle_id' => Battles::factory(),
            'player_id' => Knight::factory()
            
        ];
    }
}
