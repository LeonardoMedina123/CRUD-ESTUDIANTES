<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CarreraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Carrera::create(['nombre' => 'Ingeniería en Sistemas']);
        \App\Models\Carrera::create(['nombre' => 'Ingeniería Civil']);
        \App\Models\Carrera::create(['nombre' => 'Medicina']);
        \App\Models\Carrera::create(['nombre' => 'Derecho']);
    }
}
