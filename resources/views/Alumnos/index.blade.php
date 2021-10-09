@extends('layout')
@section('Contenido')
    <!-- Button trigger modal -->
  <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal" style="margin-left: 90px;">
    Registrar Alumno  <i class="bi bi-plus-circle-fill"></i>
  </button>
  <!-- Modal con el formulario para registrar a un alumno-->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header" style="background-color:dodgerblue;">
          <h5 class="modal-title" id="exampleModalLabel" style="color:white;">Registrar Alumno</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="{{ route('guardarAlumno') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
              <label for="nombre" class="form-label">Nombres</label>
              <input type="text" name="Nombres" class="form-control" id="nombre"  value="{{ old('Nombres') }}" required
              pattern="[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{2,64}">
              {!! $errors->first('proyecto', '<small style="color:red;>Hubo un error aqui</small><br>') !!}
            </div>
            <div class="mb-3">
              <label for="Apellidos" class="form-label">Apellidos</label>
              <input type="text" name="Apellidos" class="form-control" id="Apellidos" value="{{ old('Apellidos') }}" required
              pattern="[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{2,64}">
              {!! $errors->first('proyecto', '<small style="color:red;>Hubo un error aqui</small><br>') !!}
            </div>
            <div class="mb-3">
              <label for="fecha" class="form-label">Fecha de Nacimiento</label>
              <input type="date" name="fechasNac" class="form-control" id="fecha" required>
              {!! $errors->first('proyecto', '<small style="color:red;>Hubo un error aqui</small><br>') !!}
            </div>
            <button type="submit" class="btn btn-primary">Registrar</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- Final del Modal-->
<!--Tabla con los registros agregados con las opciones de algunas operaciones-->
  <div class="card" style="width: 60rem; margin-left: 90px;">
    <div class="card-body">
      <table class="table" id="grid">
        <thead>
          <tr>
            <th scope="col">Codigo de Alumno</th>
            <th scope="col">Nombres</th>
            <th scope="col">Apellidos</th>
            <th scope="col">Operaciones</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($alumno as $alumnos)
          <tr>
            <th>{{$alumnos->CodigoAlumno}}</th>
           <th>{{ $alumnos->Nombres }}</th>
           <th>{{ $alumnos->Apellidos }}</th>
           <th>
             <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editar" style="margin-left: 90px;">
              <i class="bi bi-pencil-square"></i></button>
              <!-- Modal para editar alguno de los registros-->
                <div class="modal fade" id="editar" tabindex="-1" aria-labelledby="editarLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header" style="background-color:orange">
                        <h5 class="modal-title" id="editarLabel" style="color:white;">Modificar Alumno</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <form action="{{ route('ActualizarAlumno',['CodigoAlumno'=> $alumnos->CodigoAlumno]) }}" method="POST" enctype="multipart/form-data">
                          @csrf
                          <div class="mb-3">
                            <label for="nombre" class="form-label">Nombres</label>
                            <input type="text" name="Nombres" class="form-control" id="nombre"  value="{{ $alumnos->Nombres }}" required
                            pattern="[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{2,64}">
                            {!! $errors->first('proyecto', '<small style="color:red;>Hubo un error aqui</small><br>') !!}
                          </div>
                          <div class="mb-3">
                            <label for="Apellidos" class="form-label">Apellidos</label>
                            <input type="text" name="Apellidos" class="form-control" id="Apellidos" value="{{ $alumnos->Apellidos }}" required
                            pattern="[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{2,64}">
                            {!! $errors->first('proyecto', '<small style="color:red;>Hubo un error aqui</small><br>') !!}
                          </div>
                          <div class="mb-3">
                            <label for="fecha" class="form-label">Fecha de Nacimiento</label>
                            <input type="date" name="fechasNac" class="form-control" id="fecha" required>
                            {!! $errors->first('proyecto', '<small style="color:red;>Hubo un error aqui</small><br>') !!}
                          </div>
                          <button type="submit" class="btn btn-primary">Actualizar</button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
                <!--Fin del Modal-->
            <a href="{{ URL::route('alumnoEliminado',['CodigoAlumno' => $alumnos->CodigoAlumno])}}"><Button class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></Button></a></th>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
  <!-- fin de la Tabla-->
@endsection