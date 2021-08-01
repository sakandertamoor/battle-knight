<?php

namespace Database\Seeders;

use App\Models\BattleAttacks;
use Illuminate\Database\Seeder;

class BattleAttacksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BattleAttacks::factory(5)->create();
    }
}
