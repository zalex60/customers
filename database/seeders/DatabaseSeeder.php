<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    public function run()
    {
        $this->call(RegionsSeeder::class);
        $this->call(CommunesSeeder::class);
        $this->call(UsersSeeder::class);
    }
}
