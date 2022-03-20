<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UsersSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'id'=>'1',
            'name'=>'admin',
            'email'=>'admin@admin.com',
            'email_verified_at'=>'2021-03-12 15:24:59',
            'password'=>bcrypt('admin')
        ]);
    }
}
