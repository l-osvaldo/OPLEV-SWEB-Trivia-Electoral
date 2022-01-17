<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePreguntasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('preguntas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('idrubro')->unsigned();
            $table->string('rubro', 100);
            $table->integer('idsubrubro')->unsigned();
            $table->string('subrubro', 50);
            $table->string('etiquetas', 150);
            $table->string('pregunta', 900);
            $table->string('opcion_a', 300);
            $table->string('opcion_b', 300);
            $table->string('opcion_c', 300);
            $table->string('respuesta', 5);
            $table->string('complemento_error', 250);
            $table->integer('version')->default(1);
            $table->integer('status')->default(1)->unsigned();
            $table->integer('status_error')->default(1)->unsigned();
            $table->integer('actualizar_banco')->default(0)->unsigned();
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
        Schema::dropIfExists('preguntas');
    }
}
