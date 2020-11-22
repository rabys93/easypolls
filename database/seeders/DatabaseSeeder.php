<?php

namespace Database\Seeders;
use App\Models\Choice;
use App\Models\Poll;
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
       Poll::factory(5)->create();
       Choice::factory(6)->create();
        // \App\Models\User::factory(10)->create();
    }
}
