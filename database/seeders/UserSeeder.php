<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        User::insert([
            [
                'name' => 'Client',
                'email' => 'client@client.fr',
                'password' => Hash::make('password'),
                'role_id' => 1,
            ],
            [
                'name' => 'Staff',
                'email' => 'staff@staff.fr',
                'password' => Hash::make('password'),
                'role_id' => 2,
            ],
            [
                'name' => 'Admin',
                'email' => 'admin@admin.fr',
                'password' => Hash::make('password'),
                'role_id' => 3,
            ],
        ]);
    }
}
