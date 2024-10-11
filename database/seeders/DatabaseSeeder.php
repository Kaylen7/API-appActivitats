<?php

namespace Database\Seeders;

use App\Models\Usuari;
use App\Models\Activitat;
use Illuminate\Database\Seeder;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\AsistenciaUsuariActivitat;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //Usuari::factory(5)->create();
        //Activitat::factory(5)->create();
        AsistenciaUsuariActivitat::factory(5)->create();
    }
}
