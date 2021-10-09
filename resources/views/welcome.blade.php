@extends('layout')
@section('Contenido')
    <br>
<!--Tutilo-->
   <center><h1>Bienvenido</h1></center>
 <!--Seccion de catalogos-->
  <section>
      <br>
   <!--Contenido de la pagina-->   
   <!--Tarjetas con informacion-->   
    <div class="row row-cols-1 row-cols-md-2 g-4" style="margin-left: 90px;">
        <div class="col">
          <div class="card text-white bg-primary mb-3" style="max-width: 25rem;">
            <div class="card-body">
              <h5 class="card-title">Alumnos</h5>
              <p class="card-text">Aqui es donde puedes hacer registrar nuevos alumnos, consultar a todos los alumnos,
                 modificar sus datos, y eliminar a los alumnos.</p>
              <a href="{{ route('Alumnos') }}"><button type="button" class="btn btn-outline-light">Vamos</button></a>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card text-white bg-success mb-3" style="max-width: 25rem;">
            <div class="card-body">
              <h5 class="card-title">Materias</h5>
              <p class="card-text">Aqui es donde puede registrar las materias que necesarias, consultar las registradas y eliminarlas.</p>
              <a href="{{ route('materias') }}"><button type="button" class="btn btn-outline-light">Vamos</button></a>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card text-white bg-dark mb-3" style="max-width: 25rem;">
            <div class="card-body">
              <h5 class="card-title">Alumnos Inscritos</h5>
              <p class="card-text">Aqui puede inscribir a los alumnos a las distintas materias, ver los alumnos ya inscritos, dar de baja las materias y actualizar calificaciones. </p>
              <a href=" {{ route('inscribir') }}"><button type="button" class="btn btn-outline-light">Vamos</button></a>
            </div>
          </div>
        </div>
      </div>
  </section>
  <!--Tarjetas con informacion--> 
@endsection