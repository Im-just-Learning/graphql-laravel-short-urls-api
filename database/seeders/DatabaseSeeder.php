<?php

namespace Database\Seeders;

use App\Models\Shorter\ShorterLink;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        ShorterLink::factory(100)->create();
    }
}
