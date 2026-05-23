<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Putra Harapan Tafonao',
            'email' => 'putraharapantafonao199@gmail.com',
            'password' => Hash::make('@Putra714'),
        ]);
    }
}
