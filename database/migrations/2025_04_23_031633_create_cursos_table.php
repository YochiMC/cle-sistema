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

            $table->foreignId('id_docente')
                ->constrained('docentes', 'id_docente')
                ->cascadeOnDelete();

            $table->string('modelo_solucion_curso', 50);
            $table->string('tecnm_curso', 50);
            $table->char('modelo_curso', 50);
            $table->string('modulo_curso', 50);
            $table->char('nombre_tms_curso', 50);

            $table->date('inicio_curso');
            $table->date('fin_curso');
            $table->string('dias_curso', 50);
            $table->string('horario_curso', 50);

            $table->unsignedInteger('alumnos_actuales_curso');
            $table->unsignedInteger('cupo_curso');

            $table->string('clases_via_curso', 50);
            $table->string('tipo_curso', 50);
            $table->string('acceso_plataforma_curso', 50);
            $table->text('acceso_teams_curso');
            $table->text('link_clase_curso');

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
        Schema::dropIfExists('cursos');
    }
};
