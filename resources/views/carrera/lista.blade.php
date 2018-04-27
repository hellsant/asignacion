@extends('layouts.principal')
@section('titulo1', 'LISTA')
@section('titulo2', 'DE CARRERAS')
@section('content')
<div class="table-responsive">
<table class="table">
    <thead class="thead-light">
      <tr>
          <th scope="col">Codigo Carrera</th>
          <th scope="col">Nombre</th>
          <th scope="col">
            <div class="text-center">
              <h3>
                <a href='{{ route('carrera.create')}}' data-toggle="tooltip" data-placement="right" title="Registar">
                  <i class="fas fa-plus-square" aria-hidden="true" ></i>
                </a>
              </h3>
            </div>
          </th>
        </tr>
    </thead>
    <tbody>
        @foreach($carreras as $carrera)
      <tr>
        <td>{{ $carrera -> COD_CARRERA}} </td>
        <td>{{ $carrera -> NOM_CARRERA}} </td>
        <td>
            <div class="text-center">
                <h4>
                  <a href='{{ route('carrera.edit',$carrera->id)}}' data-toggle="tooltip" data-placement="right" title="Editar">
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