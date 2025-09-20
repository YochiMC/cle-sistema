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
            $table->id('id_kardex');
            $table->foreignId('id_alumno')->constrained('alumnos', 'id_alumno')->cascadeOnDelete();
            $table->foreignId('id_nivel')->constrained('niveles', 'id_nivel');
            $table->unsignedTinyInteger('calificacion_kardex');
            $table->string('periodo_kardex', 100);
            $table->string('estado_kardex', 100);
            $table->boolean('evaluado_kardex')->default(false);
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
