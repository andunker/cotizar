<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRespuestasAceptadas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cotizaciones_aceptadas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cliente_id')->unsigned();
            $table->integer('cotizacion_id')->unsigned();
            $table->integer('respuesta_cotizacion_id')->unsigned();
            $table->string('json_productos');
            $table->double('valor_productos', 8, 2);
            $table->double('valor_envio', 8, 2);
            $table->double('valor_descuento', 8, 2);
            $table->double('total', 8, 2);
            $table->timestamps();

            $table->foreign('cliente_id')->references('id')->on('clientes');
            $table->foreign('cotizacion_id')->references('id')->on('cotizaciones');
            $table->foreign('respuesta_cotizacion_id')->references('id')->on('respuestas_cotizaciones');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cotizaciones_aceptadas');
    }
}
