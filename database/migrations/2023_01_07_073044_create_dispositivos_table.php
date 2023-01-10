<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDispositivosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dispositivos', function (Blueprint $table) {
            $table->id();
            $table->string('codpatrominal')->nullable(); //codpatri
            $table->string('descripcion',100)->nullable();
            $table->string('modelo',20)->nullable();
            $table->string('marca',15)->nullable();
            $table->string('serie',12)->nullable();
            $table->string('color',9)->nullable();
            $table->enum('estado',['Incidencia','Funcional','Suspendido','Inactivo'])->default('Funcional');
            $table->enum('condicion',['Nuevo','Regular','Malo','Chatarra'])->default('Regular');
            $table->string('posicion')->nullable();
            $table->string('observacion')->nullable();
            $table->foreignId('oficina_id')->constrained();
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
        Schema::dropIfExists('dispositivos');
    }
}
