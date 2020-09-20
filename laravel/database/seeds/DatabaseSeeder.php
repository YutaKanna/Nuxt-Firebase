<?php

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
        $this->call(InitGendersSeeder::class);
        $this->call(InitTriggersSeeder::class);
        $this->call(InitTypesSeeder::class);
    }
}
