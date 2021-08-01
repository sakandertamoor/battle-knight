<?php

namespace Database\Seeders;

use App\Models\KnightSkill;
use Illuminate\Database\Seeder;

class KnightSkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        KnightSkill::factory(5)->create();
    }
}
