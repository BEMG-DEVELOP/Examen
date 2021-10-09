<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Calificaciones;
use App\Models\Alumnos;
use App\Models\Materia;
use Illuminate\Support\Facades\DB;

class CalificacionesController extends Controller
{
    /*La funcion index solo contienen una consulta a la base de datos
    por medio del modelo, para poder mostrar la informacion en la tabla */
    public function index()
    {   //Variables para hacer la inscripcion, que va en los select
        $Alumnos = Alumnos::select('CodigoAlumno','Nombres','Apellidos')->get();
        $Materias = Materia::select('CodigoMateria','Materia')->get();
        
        $Grupos = DB::select("select cat_re.id_rel, cat_al.CodigoAlumno,CONCAT(cat_al.Nombres,' ', cat_al.Apellidos) Nombre,
                                    cat_al.fechasNac,
                                    cat_re.CodigoMateria,
                                    cat_ma.Materia,
                                    cat_re.Calificacion 
                            from Cat_rel___Alumno___Materia as cat_re
                            inner join Cat__Alumnos as cat_al on cat_al.CodigoAlumno = cat_re.CodigoAlumno
                            inner join Cat__Materias as cat_ma on cat_ma.CodigoMateria = cat_re.CodigoMateria");

        return view('Operaciones.Inscribir',compact('Alumnos','Materias','Grupos'));
    }
    /*Recopilacion de datos para poder guardad en la base de datos
    corroborando que los campos no vayan vacios de dos manera, una desde la vista
    y otra en el controlador, por medio de los modelos guardamos la informacion, 
    y redireccionamos a al tabla para ver el registro nuevo*/ 
    public function store(Request $request)
    {
        $this->validate($request,[
            'CodigoAlumno' => 'required',
            'CodigoMateria' => 'required',
        ]);
         
        $inscripcion = new Calificaciones();
        $inscripcion->CodigoAlumno = $request->CodigoAlumno;
        $inscripcion->CodigoMateria = $request->CodigoMateria;
        $inscripcion->Calificacion = 0;
        $inscripcion->save();
        
        return back()->with('alumnoRegistrado','El Alumno a sido Registrado Exitosamente');

    }
   /*La funcion edit solo contienen una consulta a la base de datos
    por medio del modelo, para poder mostrar la informacion del registro seleccionado */
    public function edit($id_rel)
    {
        $estudiante = DB::select("select cat_re.id_rel, cat_al.CodigoAlumno,CONCAT(cat_al.Nombres,' ', cat_al.Apellidos) Nombre,
                                    cat_al.fechasNac,
                                    cat_re.CodigoMateria,
                                    cat_ma.Materia,
                                    cat_re.Calificacion 
                            from Cat_rel___Alumno___Materia as cat_re
                            inner join Cat__Alumnos as cat_al on cat_al.CodigoAlumno = cat_re.CodigoAlumno
                            inner join Cat__Materias as cat_ma on cat_ma.CodigoMateria = cat_re.CodigoMateria
                            where id_rel =$id_rel");
                return view('Operaciones.calificacion',compact('estudiante'));
    }
    /*En esta funcion actualizamos la informacion del alumno, se recopila 
   la informacion por medio del modal de edicion y de igual forma se valida que los 
   campos
   no esten vacios desde la vista y en el controlador y se guarda la informacion. */
    public function update(Request $request, $id_rel)
    {
        $Resultado = $request->Calificacion;
        DB::update("update Cat_rel___Alumno___Materia set Calificacion = $Resultado 
                            where id_rel = $id_rel");
        return redirect('Inscribir')->with('Actualizado','El registro fue actualizado');
    }
    /*La funcion destroy solo elimina el registro que se ha seleccionado de manera fisica.*/
    public function destroy($id_rel)
    {
        $deleted = DB::delete("delete from Cat_rel___Alumno___Materia where id_rel = $id_rel");
        return back()->with('Eliminado','El registro fue eliminado');
    }
}
