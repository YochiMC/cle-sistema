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
            $table->id('id_docente'); // Clave primaria
            $table->foreignId('id_usuario')->constrained('users')->cascadeOnDelete(); // Clave foránea hacia users
            $table->string('docente_clave', 20)->unique();
            $table->string('docente_nombre', 100);
            $table->string('docente_apellidos', 100);
            $table->string('docente_sexo', 10);
            $table->integer('docente_edad');
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
        Schema::dropIfExists('docentes');
    }
};
