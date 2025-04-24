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
            $table->enum('nivel', ['basico', 'intermedio', 'avanzado']);
            $table->enum('modalidad', ['presencial', 'virtual']);
            $table->enum('hora', [
                '08:00',
                '09:00',
                '10:00',
                '11:00',
                '12:00',
                '13:00',
                '14:00',
                '15:00',
                '16:00',
                '17:00',
                '18:00',
                '19:00'
            ]);
            $table->enum('dias', ['lunes', 'martes', 'miercoles', 'jueves', 'viernes', 'sabado', 'domingo']);
            $table->unsignedInteger('cupo');
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
