<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alumnos', function (Blueprint $table) {
            $table->id('id_alumno'); // Clave primaria
            $table->foreignId('id_usuario')->constrained('users')->cascadeOnDelete(); // Clave foránea correcta
            $table->string('alumno_nombre', 100);
            $table->string('alumno_apellidos',100);
            $table->integer('alumno_edad')->check('alumno_edad >= 15');
            $table->string('carrera', 100);
            $table->integer('semestre');
            $table->unsignedBigInteger('id_seguimiento');
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
