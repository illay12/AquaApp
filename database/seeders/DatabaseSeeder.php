<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\AnuntSeeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call(AnuntSeeder::class);
    }
}