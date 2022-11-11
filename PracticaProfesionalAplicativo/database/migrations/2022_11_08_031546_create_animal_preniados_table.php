<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnimalPreniadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('animal_preniados', function (Blueprint $table) {
            $table->id();
            $table->string('nombreAnimal');
            $table->date('fechapreniado');
            $table->string('madreMurioEnParto');
            $table->integer('cantidadDeNacidos');
            $table->string('descripcion');
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
        Schema::dropIfExists('animal_preniados');
    }
}
