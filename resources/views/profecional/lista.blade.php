@extends('layouts.principal')
@section('titulo1', 'LISTA')
@section('titulo2', 'DE PROFECIONALES')
@section('content')
<div class="table-responsive">
<table class="table">
    <thead class="thead-light">
      <tr>
          <th scope="col">Titulo</th>
          <th scope="col">Nombre</th>
          <th scope="col">Apellido Paterno</th>
          <th scope="col">Apellido Materno</th>
          <th scope="col">Telefono</th>
          <th scope="col">Correo</th>
          <th scope="col">Editar</th>
          
        </tr>
    </thead>
    <tbody>
        @foreach($profecionales as $profecional)
      <tr>
        <td>{{ $profecional -> TITULO_PROF}} </td>
        <td>{{ $profecional -> NOM_PROF}} </td>
        <td>{{ $profecional -> AP_PAT_PROF}} </td>
        <td>{{ $profecional -> AP_MAT_PROF}} </td>
        <td>{{ $profecional -> TELF_PROF}} </td>
        <td>{{ $profecional -> CORREO_PROF}} </td>
        <td><a href='{{ route('profecional.edit',$profecional->id)}}' class="btn btn-warnimg">editar</a> </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
  
@endsection