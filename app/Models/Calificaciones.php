<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calificaciones extends Model
{
    use HasFactory;
    
    protected $table = 'Cat_rel___Alumno___Materia';
        
        protected $primaryKey = 'id_rel';

        protected $fillable = ['CodigoAlumno','CodigoMateria','Calificacion'];
        
            public $timestamps = true;
}
