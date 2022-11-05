<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnimalVacunadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('animal_vacunados', function (Blueprint $table) {
            $table->id();
            $table->string('nombreAnimal');
            $table->string('medicamento');
            $table->date('fechaMedAplicado');
            $table->date('proximoMedicamento');
            $table->string('enfermedad');
            $table->string('efectosSecundarios');
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
        Schema::dropIfExists('animal_vacunados');
    }
}
