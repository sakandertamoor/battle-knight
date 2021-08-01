<?php

namespace Database\Seeders;


use App\Models\Battles;
use Illuminate\Database\Seeder;

class BattlesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Battles::factory(5)->create();
    }
}
