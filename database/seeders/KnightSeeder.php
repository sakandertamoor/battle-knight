<?php

namespace Database\Seeders;

use App\Models\Knight;
use Illuminate\Database\Seeder;

class KnightSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Knight::factory(5)->create();
    }
}
