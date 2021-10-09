@extends('layout')
@section('Contenido')
 <button type="button" class="btn btn-success btn-lg" data-bs-toggle="modal" data-bs-target="#exampleModal" style="margin-left: 30px;" >
          Inscribir  <i class="bi bi-plus-circle-fill"></i>
 </button>
      <!-- Modal -->
      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Inscribir alumno</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form action="{{ route('inscrito') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                  <label for="Codigo" class="form-label">Codigo de la materia</label>
                  <select name="CodigoAlumno"  class="form-control" id="Codigo">
                    <option>--Seleccione una Opcion--</option>
                    @foreach ($Alumnos as $alumno)
                    <option value="{{ $alumno->CodigoAlumno }}">{{ $alumno->CodigoAlumno }}-{{ $alumno->Nombres }}</option>
                    @endforeach  
                  </select>
                </div>
                <div class="mb-3">
                  <label for="Materia" class="form-label">Materia</label>
                  <select name="CodigoMateria" class="form-control" id="Materia">
                    <option>--Seleccione una Opcion--</option>
                    @foreach ($Materias as $materia)
                    <option value="{{ $materia->CodigoMateria }}"> {{$materia->Materia}}</option>
                    @endforeach
                  </select>
                </div>
                <button  class="btn btn-primary">Registrar</button>
              </form>
            </div>
          </div>
        </div>
      </div>
      <div class="card" style="width: 80rem; margin-left: 30px;">
        <div class="card-body">
            <table id="grid" class="table table-striped table-bordered dt-responsive nowrap">
                <thead>
                    <tr>
                        <th>Codigo del Alumno</th>
                        <th>Nombre Completo del Alumno</th>
                        <th>Fecha de Nacimiento</th>
                        <th>Codigo de la materia</th>
                        <th>Materias</th>
                        <th>Calificacion</th>
                        <th>Operaciones</th>
                    </tr>
                </thead>
            <tbody>
              @foreach ($Grupos as $grupo)
                <tr>
                    <td>{{ $grupo->CodigoAlumno}}</td>
                    <td>{{ $grupo->Nombre }}</td>
                    <td>{{ $grupo->fechasNac}}</td>
                    <td>{{ $grupo->CodigoMateria}}</td>
                    <td>{{ $grupo->Materia }}</td>
                    <td>{{ $grupo->Calificacion}} </td>
                    <td><a href="{{ URL::route('editarcali',['id_rel'=>$grupo->id_rel])}}"><button type="button" class="btn btn-warning btn-sm"><i class="bi bi-pencil-square"></i></button></a>                          
                      <a href="{{ URL::route('debaja',['id_rel' => $grupo->id_rel])}}"><Button class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></Button></a></td>
                </tr>
              @endforeach
            </tbody>
            </table>
        </div>
      </div>
@endsection