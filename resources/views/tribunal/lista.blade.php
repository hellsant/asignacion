@extends('layouts.principal')
@section('titulo1', 'LISTA')
@section('titulo2', 'DE TRIBINALES')
@section('content')
<div class="table-responsive">
<table class="table">
    <thead class="thead-light">
      <tr>
          <th scope="col">Codigo Estudiante</th>
          <th scope="col">Estudiante</th>
          <th scope="col">Nombre Del Proyecto</th>
          <th scope="col">Fecha Registro</th>
          <th scope="col">Fecha Inicio</th>
          <th scope="col">Fecha Defensa</th>
          <th scope="col">Gestion Prorroga</th>
          <th scope="col">Tribunales</th>
          <th scope="col">Opciones</th>
        </tr>
    </thead>
    <tbody>
      
      @foreach ($estudianteArray as $estudiante )
      @foreach ($tribunalArray as $tribunal )
      @foreach ($proyectoArray as $proyecto )
    <tr>
      <td>{{ $estudiante->id}}</td>
      <td>{{ $estudiante->NOM_EST}}</td>
      <td>{{ $proyecto->TITULO_PERFIL}}</td>
      <td>{{ $proyecto->FECHA_REGISTRO}}</td>
      <td>{{ $proyecto->FECHA_INI}}</td>
      <td>{{ $proyecto->FECHA_DEF}}</td>
      <td>{{ $proyecto->GESTION_PRORROGA}}</td>
      <td>{!! Form::select('docentes' , $tribunalArray ,$tribunal,['class'=>'form-control']) !!} </td>
      <td>
        <div class="text-center">
        </div> 
        <div class="text-center">
        </div> 
      </td>
    </tr>
    @endforeach
    @endforeach
    @endforeach
    </tbody>
  </table>
</div>
@endsection