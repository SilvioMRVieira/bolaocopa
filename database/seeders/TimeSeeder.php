<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Time;

class TimeSeeder extends Seeder
{
    public function run(): void
    {
        $times = [
            ['nome' => 'Brasil', 'sigla' => 'BRA'],
            ['nome' => 'Argentina', 'sigla' => 'ARG'],
            ['nome' => 'França', 'sigla' => 'FRA'],
            ['nome' => 'Alemanha', 'sigla' => 'ALE'],
        ];

        foreach ($times as $time) {
            Time::create($time);
        }
    }
}