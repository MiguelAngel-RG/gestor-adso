<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Administrador
        User::create([
            'name' => 'Administrador ADSO',
            'email' => 'admin@adso.edu.co',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        // Instructor
        User::create([
            'name' => 'Instructor ADSO',
            'email' => 'instructor@adso.edu.co',
            'password' => Hash::make('password'),
            'role' => 'instructor',
        ]);

        // Aprendiz
        User::create([
            'name' => 'Aprendiz ADSO',
            'email' => 'aprendiz@adso.edu.co',
            'password' => Hash::make('password'),
            'role' => 'aprendiz',
        ]);
    }
}