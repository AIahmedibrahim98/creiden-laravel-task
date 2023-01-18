<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    public function run()
    {
        Admin::create([
            'name' => 'Admin Account',
            'username' => 'admin',
            'email' => 'admin@mail.com',
            'password' => '12345678',
        ]);
    }
}
