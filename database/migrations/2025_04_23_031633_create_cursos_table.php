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
            $table->string('nivel_curso', 100);
            $table->string('modalidad_curso', 100);
            $table->string('hora_inicio_curso', 5);
            $table->string('hora_fin_curso', 5);
            $table->string('dias_curso', 100);
            $table->unsignedInteger('cupo_curso');
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
