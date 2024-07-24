<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('nota', function (Blueprint $table) { //creamos tabla nota
            $table->id();
            $table->decimal('nota', 3, 2);
            $table->unsignedBigInteger('estudiante_id'); //Usamos datos de estudiante
            $table->unsignedBigInteger('materias_id'); //Usamos datos de materia
            $table->timestamps();

            $table->foreign('estudiante_id')->references('id')->on('estudiantes');//Creamos claves foraneas
            $table->foreign('materias_id')->references('id')->on('materias');//Creamos claves foraneas

            $table->unique(['materias_id', 'estudiante_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nota');
    }
};
