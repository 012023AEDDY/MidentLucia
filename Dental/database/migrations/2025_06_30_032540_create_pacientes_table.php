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
        Schema::create('pacientes', function (Blueprint $table) {
            $table->id('id_paciente');
            $table->string('nombre', 40);
            $table->string('apaterno', 40);
            $table->string('amaterno', 40);
            $table->string('dni', 8);
            $table->date('fecha_nacimiento');
            $table->string('telefono', 9);
            $table->string('direccion', 40);
            $table->string('sexo', 2);
            $table->string('email', 60);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pacientes');
    }
};
