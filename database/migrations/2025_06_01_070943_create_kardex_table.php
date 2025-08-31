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
        Schema::create('kardex', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_alumno')->constrained('alumnos', 'id_alumno')->cascadeOnDelete();
            $table->foreignId('id_nivel')->constrained('niveles');
            $table->unsignedTinyInteger('calificacion'); // 0 - 100
            $table->string('periodo', 100); // Ejemplo: 2024-2
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
        Schema::dropIfExists('kardex');
    }
};
