<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRespuestasCotizaciones extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('respuestas_cotizaciones', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cotizacion_id')->unsigned();
            $table->integer('proveedor_id')->unsigned();
            $table->integer('dias_envio_promedio');
            $table->string('detalle');
            $table->string('json_productos');
            $table->dateTime('fecha_cierre');
            $table->integer('tipo_envio_id')->unsigned();
            $table->timestamps();

            $table->foreign('cotizacion_id')->references('id')->on('cotizaciones');
            $table->foreign('proveedor_id')->references('id')->on('proveedores');
            $table->foreign('tipo_envio_id')->references('id')->on('tipo_envios');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('respuestas_cotizaciones');
    }
}
