<?php

namespace Database\Seeders;

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
        // $this->call(RoleSeed::class);
        // $this->call(UserSeed::class);
        // $this->call(EventSeed::class);
        // $this->call(TicketSeed::class);
        $this->call(CountriesSeeder::class);
    }
}
