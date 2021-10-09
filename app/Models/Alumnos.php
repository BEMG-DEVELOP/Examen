<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumnos extends Model
{
    use HasFactory;
    
    protected $table = 'Cat__Alumnos';

    protected $primaryKey = 'CodigoAlumno';

        protected $fillable = ['Nombres','Apellidos','fechasNac'];
        
            public $timestamps = true;
}
