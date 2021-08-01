<?php

namespace Database\Factories;

use App\Models\Knight;
use App\Models\KnightSkill;
use App\Models\Skill;
use Illuminate\Database\Eloquent\Factories\Factory;

class KnightSkillFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = KnightSkill::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'knight_id' => Knight::factory(),
            'skill_id' => Skill::factory(),
            'value' =>  rand(50,80)
        ];
    }
}
