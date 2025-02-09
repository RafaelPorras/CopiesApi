<?php

namespace Database\Seeders;

use App\Models\Copy;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Copy::factory()->count(60)->create();
    }
}
