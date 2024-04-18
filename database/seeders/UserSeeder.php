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
     */
    public function run(): void
    {
        (new User())->insert([
           'username' => 'John',
           'email' => 'artisan@gmail.com',
           'password' => Hash::make('php'),
           'created_at' => now(),
           'updated_at' => now(),
        ]);
    }
}
