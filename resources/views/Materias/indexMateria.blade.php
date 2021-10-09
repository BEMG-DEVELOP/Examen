@extends('layout')
@section('Contenido')
    <!-- Button trigger modal -->
  <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal" style="margin-left: 90px;">
    Registrar Materias  <i class="bi bi-plus-circle-fill"></i>
  </button>
  <!-- Modal  con el formulario para agregar las materias necesarias-->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Registrar Materia</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="{{ route('guardarMateria') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
              <label for="Codigo" class="form-label">Codigo de la materia</label>
              <input type="text" name="CodigoMateria" class="form-control" id="Codigo">
            </div>
            <div class="mb-3">
              <label for="Materia" class="form-label">Materia</label>
              <input type="text" name="Materia" class="form-control" id="Materia">
            </div>
            <button type="submit" class="btn btn-primary">Registrar</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- Fin del Modal-->
  <!--Tabla con los registros agregados con las opciones de algunas operaciones-->

  <div class="card" style="width: 60rem; margin-left: 90px;">
    <div class="card-body">
       <table class="table" id="grid">
          <thead>
            <tr>
              <th scope="col">Codigo de Materia</th>
              <th scope="col">Materias</th>
              <th scope="col">Operaciones</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($Materias as $materia)
            <tr>
            <th>{{ $materia->CodigoMateria }}</th>
            <th>{{ $materia->Materia }}</th>
            <th>
              <a href="{{ URL::route('eliminarMateria',['CodigoMateria' => $materia->CodigoMateria])}}"><Button class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></Button></a></td>
            </th>
            </tr>
            @endforeach
          </tbody>
      </table>
    </div>
 </div>
 <!--Fin de Tabla-->
@endsection