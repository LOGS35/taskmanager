<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddProyectoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proyecto', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 20);
            $table->dateTime('fecha_inicio');
            $table->dateTime('fecha_fin');
            $table->string('description', 100);
            $table->enum('estado', ['En proceso', 'En revisión','Aprobado','Falta Información','Incompleto','Detenido','Terminado'])->default('En proceso');
            $table->integer('id_cliente')->unsigned();
            $table->integer('id_equipo')->unsigned();
            $table->foreign('id_cliente')->references('id')->on('cliente')->onDelete('cascade');
            $table->foreign('id_equipo')->references('id')->on('equipo')->onDelete('cascade');
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
        Schema::dropIfExists('proyecto');
    }
}
