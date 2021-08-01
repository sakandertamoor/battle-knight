<?php

namespace Database\Seeders;

use App\Models\BattleAttacks;
use App\Models\Battles;
use App\Models\KnightSkill;
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
        // \App\Models\User::factory(10)->create();
        $this->call([
            KnightSkillSeeder::class,
            KnightVirtueSeeder::class,
            BattlesSeeder::class,
            BattleAttacksSeeder::class,
            UserSeeder::class    
        ]);
    }
}
