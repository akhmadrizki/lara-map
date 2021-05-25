<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            'name'     => 'admin',
            'email'    => 'admin@lara.com',
            'username' => 'admin',
            'password' => Hash::make('admin123'),
        ];

        User::create($user);
    }
}
