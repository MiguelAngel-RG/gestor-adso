<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Limpiamos los usuarios existentes para evitar duplicados al ejecutar el seeder
        User::whereIn('email', ['admin@adso.com', 'instructor@adso.com', 'aprendiz@adso.com'])->delete();

        User::create([
            'name'     => 'Administrador ADSO',
            'email'    => 'admin@adso.com',
            'role'     => 'admin',
            'password' => Hash::make('password123'),
        ]);

        User::create([
            'name'     => 'Instructor ADSO',
            'email'    => 'instructor@adso.com',
            'role'     => 'instructor',
            'password' => Hash::make('password123'),
        ]);

        User::create([
            'name'     => 'Aprendiz ADSO',
            'email'    => 'aprendiz@adso.com',
            'role'     => 'aprendiz',
            'password' => Hash::make('password123'),
        ]);
    }
}