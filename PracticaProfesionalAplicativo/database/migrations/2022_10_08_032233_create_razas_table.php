<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRazasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('razas', function (Blueprint $table) {
            $table->id();
            $table->string('nombreRaza');
            $table->integer('pesoPromNac');
            $table->string('pesoMaxAdulto');
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
        Schema::dropIfExists('razas');
    }
}
