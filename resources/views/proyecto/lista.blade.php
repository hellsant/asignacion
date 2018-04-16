@extends('layouts.principal')
@section('titulo1', 'LISTA')
@section('titulo2', 'DE PERFILES')
@section('content')
<div class="table-responsive">
<table class="table">
    <thead class="thead-light">
      <tr>
          <th scope="col">Titulo</th>
          <th scope="col">Fecha Registro</th>
          <th scope="col">Fecha Limite</th>
          <th scope="col">fecha inicio</th>
          <th scope="col">fecha defensa</th>
          <th scope="col">
            <div class="text-center">
              <h3>
                <a href='{{ route('proyecto.create')}}' data-toggle="tooltip" data-placement="right" title="Registar">
                  <i class="fas fa-plus-square" aria-hidden="true" ></i>
                </a>
              </h3>
            </div>
          </th>
        </tr>
    </thead>
    <tbody>
        @foreach($proyectos as $proyecto)
      <tr>
        <td>{{ $proyecto -> TITULO_PERFIL}} </td>
        <td>{{ $proyecto -> FECHA_REGISTRO}} </td>
        <td>{{ $proyecto -> FECHA_LIMITE}} </td>
        <td>{{ $proyecto -> FECHA_INI}} </td>
        <td>{{ $proyecto -> FECHA_DEF}} </td>
        <td>
            <div class="text-center">
                <h4>
                  <a href='{{ route('proyecto.edit',$proyecto->id)}}' data-toggle="tooltip" data-placement="right" title="Editar">
                      <i class="fas fa-pencil-alt"aria-hidden="true"></i>
                  </a>
              </h4>
            </div> 
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
  
@endsection