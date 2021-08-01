<?php

namespace Database\Seeders;

use App\Models\KnightVirtue;
use Illuminate\Database\Seeder;

class KnightVirtueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        KnightVirtue::factory(5)->create();
    }
}
