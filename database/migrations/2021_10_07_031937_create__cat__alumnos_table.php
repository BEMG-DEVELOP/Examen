<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCatAlumnosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Cat__Alumnos', function (Blueprint $table) {
            $table->id('CodigoAlumno',4);
            $table->string('Nombres',50);
            $table->string('Apellidos',50);
            $table->date('fechasNac',8);
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
        Schema::dropIfExists('_cat__alumnos');
    }
}
