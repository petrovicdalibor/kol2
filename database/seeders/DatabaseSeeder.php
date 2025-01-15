<?php

namespace Database\Seeders;

use App\Models\Jet;
use App\Models\Review;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        Jet::factory(10)->create();
        Review::factory(20)->create();
    }
}
