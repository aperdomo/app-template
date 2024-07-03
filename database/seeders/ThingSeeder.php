<?php

namespace Database\Seeders;

use App\Models\Thing;
use Illuminate\Database\Seeder;

class ThingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Thing::factory()
            ->count(10)
            ->create();
    }
}
