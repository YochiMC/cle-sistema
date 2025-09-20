<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('salones', function (Blueprint $table) {
            $table->id('id_salon');
            $table->string('nombre_salon', 100);
            $table->string('edificio_salon', 100);
            $table->unsignedInteger('capacidad_salon');
            $table->boolean('disponibilidad_salon')->default(true);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('salones');
    }
};
