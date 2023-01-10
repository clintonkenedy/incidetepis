<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('persona_id')->constrained();
            $table->string('incidencia',100);
            $table->foreignId('oficina_id')->constrained();
            $table->foreignId('dispositivo_id')->constrained();
            $table->enum('estado',['Pendiente', 'Solucionado', 'Cancelado', 'Inactivo'])->default('Pendiente');
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
        Schema::dropIfExists('tickets');
    }
}
