<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Fase;

class FaseSeeder extends Seeder
{
    public function run(): void
    {
        Fase::create(['nome' => 'Fase de Grupos', 'ordem' => 1, 'id_bolao' => 1]);
        Fase::create(['nome' => 'Oitavas de Final', 'ordem' => 2, 'id_bolao' => 1]);
        Fase::create(['nome' => 'Quartas de Final', 'ordem' => 3, 'id_bolao' => 1]);
        Fase::create(['nome' => 'Semifinal', 'ordem' => 4, 'id_bolao' => 1]);
        Fase::create(['nome' => 'Final', 'ordem' => 5, 'id_bolao' => 1]);
    }
}