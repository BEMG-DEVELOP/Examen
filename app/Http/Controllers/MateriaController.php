<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Materia;
use Illuminate\Support\Facades\DB;

class MateriaController extends Controller
{
    /*La funcion index solo contienen una consulta a la base de datos
    por medio del modelo, para poder mostrar la informacion en la tabla */ 
    public function index()
    {
        $Materias = Materia::select('CodigoMateria','Materia')->get();
        return view('Materias.indexMateria',compact('Materias'));
    }
     /*Recopilacion de datos para poder guardad en la base de datos
    corroborando que los campos no vayan vacios de dos manera, una desde la vista
    y otra en el controlador, por medio de los modelos guardamos la informacion, 
    y redireccionamos a al tabla para ver el registro nuevo*/ 
    public function store(Request $request)
    {
        $this->validate($request, [
            'CodigoMateria'     =>  'required',
            'Materia'           =>  'required'
        ]);

        $Materia = new Materia();
        $Materia->CodigoMateria      = $request->CodigoMateria;
        $Materia->Materia            = $request->Materia;
        $Materia->save();

        return back()->with('MateriaRegistrada','La materia a sido Registrado Exitosamente');
    }
    /*La funcion destroy solo elimina el registro que se ha seleccionado de manera fisica.*/
    public function destroy($id_Materia)
    {
        $deleted = DB::delete("delete from Cat__Materias where id_Materia = $id_Materia");
        return back()->with('Eliminado','El registro fue eliminado');
    }
}
