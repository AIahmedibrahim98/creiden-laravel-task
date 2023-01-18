<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'User Account',
            'email' => 'user@mail.com',
            'password' => '12345678',
        ]);
    }
}
