@extends('layout')
@section('Contenido')
<div>
    <div>
      <div >
        <div class="modal-header" style="background-color: orange;">
          <h5 class="modal-title" id="editarLabel">Calificar alumno</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
         @foreach ($estudiante as $estu)
            <form action="{{ route('resultados',['id_rel'=>$estu->id_rel]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="Nombre" class="form-label">Nombre del Alumno</label>
                    <input type="text"  class="form-control" id="Nombre"  value="{{ $estu->Nombre}}" disabled>
                </div>
                <div class="mb-3">
                    <label for="Materia" class="form-label">Materia</label>
                    <input type="text" class="form-control" id="Materia" value="{{ $estu->Materia}}" disabled>
                </div>
                <div class="mb-3">
                <label for="calificacion" class="form-label">Calificación para el alumno:</label>
                <input type="text" name="Calificacion" class="form-control" id="calificacion" required>
                </div>
                <button  class="btn btn-primary">Calificar</button>
            </form>
          @endforeach
        </div>
      </div>
    </div>
  </div>
@endsection