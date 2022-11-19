<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGanadoEnVentasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ganado_en_ventas', function (Blueprint $table) {
            $table->id();
            $table->string('nombreAnimal');
            $table->float('peso');
            $table->string('raza');
            $table->string('genero');
            $table->integer('precioDeVenta');
            $table->date('fechaDeVenta');
            $table->string('nombreNuevoDuenio');
            $table->string('imagen');
            $table->string('observaciones');
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
        Schema::dropIfExists('ganado_en_ventas');
    }
}
