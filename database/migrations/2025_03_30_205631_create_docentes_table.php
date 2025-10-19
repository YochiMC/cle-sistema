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
        Schema::create('docentes', function (Blueprint $table) {
            $table->id('id_docente');
            $table->foreignId('id_usuario')->constrained('users')->cascadeOnDelete();
            $table->string('rfc_docente', 13)->unique();
            $table->string('nombre_docente', 100);
            $table->string('apellido_paterno_docente', 100);
            $table->string('apellido_materno_docente', 100);
            $table->string('sexo_docente', 10);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('docentes');
    }
};
