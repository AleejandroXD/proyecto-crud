<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MateriaSeeder extends Seeder
{
    public function run()
    {
        $deleted = DB::table('materias')->delete(); //Elimina la tabla en cada update
        DB::table('materias')->insertOrIgnore([ //Selecciona la tabla materia e inserta los datos en los campos
            ['id' => 1, 'nombre' => 'Matemáticas'],
            ['id' => 2, 'nombre' => 'Ciencias'],
            ['id' => 3, 'nombre' => 'Historia'],
            ['id' => 4, 'nombre' => 'Lengua'],//Como materia solo tiene dos campos un objeto con estos campos como clave y sus valores
        ]);
    }
}