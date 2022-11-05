<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistroAnimalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registro_animals', function (Blueprint $table) {
            $table->id();
            $table->string('nombreAnimal');
            $table->date('fechaDeNacimiento');
            $table->string('genero');
            $table->float('peso');
            $table->string('raza');
            $table->string('enVenta');
            $table->string('vendido');
            $table->string('estado');
            $table->string('descripcion');
            $table->string('imagen');
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
        Schema::dropIfExists('registro_animals');
    }
}
