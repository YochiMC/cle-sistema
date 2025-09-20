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
        Schema::create('cursos', function (Blueprint $table) {
            $table->id('id_curso');
            $table->char('nombre_tms_curso', 50);
            $table->foreignId('id_docente')
                ->constrained('docentes', 'id_docente')
                ->cascadeOnDelete();
            $table->foreignId('id_nivel')->constrained('niveles', 'id_nivel');
            $table->string('horario_curso', 50);
            $table->string('inicio_curso', 50);
            $table->unsignedInteger('duracion_curso');
            $table->unsignedInteger('alumnos_actuales_curso');
            $table->unsignedInteger('cupo_curso');
            $table->string('modalidad_curso', 50);
            $table->string('via_curso', 50);
            $table->foreignId('id_salon')->constrained('salones', 'id_salon');
            $table->string('periodo_curso', 50);
            $table->boolean('estado_curso')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cursos');
    }
};
