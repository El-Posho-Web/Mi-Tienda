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
        Schema::create('envios', function (Blueprint $table) {
            $table->id('id_envio');
            $table->unsignedBigInteger('id_compra');
            $table->foreign('id_compra')->references('id_compra')->on('compras');
            $table->string('direccion');
            $table->unsignedBigInteger('id_estado_envio')->default(1);
            $table->foreign('id_estado_envio')->references('id_estado_envio')->on('estado_envios');
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
        Schema::dropIfExists('envios');
    }
};
