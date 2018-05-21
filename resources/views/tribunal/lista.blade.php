@extends('layouts.principal')
@section('titulo1', 'LISTA')
@section('titulo2', 'DE TRIBINALES')
@section('content')
<div class="form-control">
  <div class=" table-responsive">
    <table class="table ">
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
        
        @foreach ($proyectos as $proyecto)
        <tr>
          <td>{{ $proyecto->id}}</td>
          <td>{{ $proyecto->nombre}}</td>
          <td>{{ $proyecto->TITULO_PERFIL}}</td>
          <td>{{ $proyecto->FECHA_REGISTRO}}</td>
          <td>{{ $proyecto->FECHA_INI}}</td>
          <td>{{ $proyecto->FECHA_DEF}}</td>
          <td>{{ $proyecto->GESTION_PRORROGA}}</td>
          <td>
            <select name="value" id="0" class="form-control">
              @foreach ($tribunales as $tribunal)
              @if ($tribunal->id_est == $proyecto->id)
              <option value="{{ $tribunal->NOM_PROF }}">{{ $tribunal->NOM_PROF }} {{ $tribunal->AP_PAT_PROF }} </option>
              @endif
              @endforeach
            </select>
          </td>
          <td>
            <div class="text-center">
            </div> 
            <div class="text-center">
            </div> 
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
  @endsection