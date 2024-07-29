<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EstudiantesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->command->info('Insert Estudiantes...');
        $estudiantes = \App\Models\Estudiantes::factory()->count(5)->create();
        $this->command->info('Estudiantes added...');
    }
}
