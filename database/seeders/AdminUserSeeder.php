<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\Hash;
use App\Models\User;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Silvio Vieira',
            'email' => 'silvio@email.com',
            'password' => Hash::make('admin123'), // senha padrão
            'is_admin' => true, // campo para identificar admin
        ]);
    }
}
