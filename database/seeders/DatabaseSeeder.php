<?php

namespace Database\Seeders;

use App\Models\Languages\Language;
use App\Models\Users\User;
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
         User::factory(10)->create();
         Language::factory(2)->create();
    }
}
