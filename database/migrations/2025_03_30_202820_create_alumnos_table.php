<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alumnos', function (Blueprint $table) {
            $table->id('id_alumno');
            $table->foreignId('id_usuario')->constrained('users')->cascadeOnDelete();
            $table->string('matricula_alumno', 20)->unique();
            $table->string('nombre_alumno', 100);
            $table->string('apellidos_alumno', 100);
            $table->unsignedTinyInteger('edad_alumno');
            $table->string('sexo_alumno', 100);
            $table->string('carrera_alumno', 100);
            $table->unsignedTinyInteger('semestre_alumno');
            $table->boolean('inscrito')->default(false);
            $table->boolean('acredita')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alumnos');
    }
};
