<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use function PHPUnit\Framework\once;

class CreateCatRelAlumnoMateriaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Cat_rel___Alumno___Materia', function (Blueprint $table) {
            $table->id('id_rel');
            $table->integer('CodigoAlumno');
            $table->string('CodigoMateria',5);
            $table->float('Calificacion',8);
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
        Schema::dropIfExists('_cat_rel___alumno___materia');
    }
}