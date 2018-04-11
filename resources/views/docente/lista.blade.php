@extends('layouts.principal')
@section('titulo1', 'LISTA')
@section('titulo2', 'DE DOCENTES')
@section('content')
<div class="table-responsive">
<table class="table">
    <thead class="thead-light">
      <tr>
          <th scope="col">Titulo</th>
          <th scope="col">Nombre</th>
          <th scope="col">Apellido Paterno</th>
          <th scope="col">Apellido Materno</th>
          <th scope="col">carga Horaria</th>
          <th scope="col">Telefono</th>
          <th scope="col">Correo</th>
          <th scope="col">Editar</th>
          
        </tr>
    </thead>
    <tbody>
        @foreach($docentes as $docente)
      <tr>
        <td>{{ $docente -> titulodocente}} </td>
        <td>{{ $docente -> nombre}} </td>
        <td>{{ $docente -> apellidopaterno}} </td>
        <td>{{ $docente -> apellidomaterno}} </td>
        <td>{{ $docente -> cargahoraria}} </td>
        <td>{{ $docente -> telefono}} </td>
        <td>{{ $docente -> correo}} </td>
        <td><a href='{{ route('docente.edit',$docente->id)}}' class="btn btn-warnimg">editar</a> </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
  
@endsection