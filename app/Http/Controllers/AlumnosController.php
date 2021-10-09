<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Alumnos;
use Illuminate\Support\Facades\DB;

class AlumnosController extends Controller
{
    /*La funcion index solo contienen una consulta a la base de datos
    por medio del modelo, para poder mostrar la informacion en la tabla */
    public function index()
    {
        $alumno = Alumnos::select('CodigoAlumno','Nombres','Apellidos')->get();
        return view('Alumnos.index',compact('alumno'));
    }
    /*Recopilacion de datos para poder guardad en la base de datos
    corroborando que los campos no vayan vacios de dos manera, una desde la vista
    y otra en el controlador, por medio de los modelos guardamos la informacion, 
    y redireccionamos a al tabla para ver el registro nuevo*/ 
    public function store(Request $request)
    {
        $this->validate($request, [
            'Nombres'   =>  'required',
            'Apellidos' =>  'required',
            'fechasNac' =>  'required'
        ]);

        $alumno = new Alumnos();
        $alumno->Nombres    = $request->Nombres;
        $alumno->Apellidos  = $request->Apellidos;
        $alumno->fechasNac   = $request->fechasNac;
        $alumno->save();

        return back()->with('alumnoRegistrado','El Alumno a sido Registrado Exitosamente');
    }
   /*En esta funcion actualizamos la informacion del alumno, se recopila 
   la informacion por medio del modal de edicion y de igual forma se valida que los campos
   no esten vacios desde la vista y en el controlador y se guarda la informacion. */
    public function update(Request $request, $CodigoAlumno)
    {
        $this->validate($request, [
            'Nombres'   =>  'required',
            'Apellidos' =>  'required',
            'fechasNac' =>  'required'
        ]);

        $alumno = Alumnos::find($CodigoAlumno);
        $alumno->Nombres    = $request->Nombres;
        $alumno->Apellidos  = $request->Apellidos;
        $alumno->fechasNac  = $request->fechasNac;
        $alumno->save();

        return back()->with('alumnoRegistrado','El Alumno a sido Registrado Exitosamente');
    }

    /*La funcion destroy solo elimina el registro que se ha seleccionado de manera fisica.*/
    public function destroy($CodigoAlumno)
    {
        $deleted = DB::delete("delete from Cat__Alumnos where CodigoAlumno = $CodigoAlumno");
        return back()->with('Eliminado','El registro fue eliminado');
    }
}
