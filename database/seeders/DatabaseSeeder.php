<?php

namespace Database\Seeders;

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
        // \App\Models\User::factory(10)->create();
        $this->call(PagesSeeder::class);
        $this->call(PeoplesSeeder::class);
        $this->call(PortfoliosSeeder::class);
        $this->call(ServisesSeeder::class);
        $this->call(UserSeeder::class);
    }
}
