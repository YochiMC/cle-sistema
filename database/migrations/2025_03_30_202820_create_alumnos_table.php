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
            $table->foreignId('id_carrera')->constrained('carreras', 'id_carrera');
            $table->foreignId('id_nivel')->constrained('niveles', 'id_nivel');
            $table->string('matricula_alumno', 20)->unique();
            $table->string('nombre_alumno', 100);
            $table->string('apellido_paterno_alumno', 100);
            $table->string('apellido_materno_alumno', 100);
            $table->string('sexo_alumno', 100);
            $table->boolean('inscrito')->default(false);
            $table->boolean('acredita')->default(false);
            $table->boolean('liberado')->default(false);
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
