@extends('layouts.principal')
@section('titulo1', 'LISTA')
@section('titulo2', 'DE AREAS')
@section('content')
<div class="table-responsive">
<table class="table">
    <thead class="thead-light">
      <tr>
          <th scope="col">Codigo Area</th>
          <th scope="col">Nombre</th>
          <th scope="col">Descripcion</th>
          <th scope="col">
            <div class="text-center">
              <h3>
                <a href='{{ route('areas.create')}}' data-toggle="tooltip" data-placement="right" title="Registar">
                  <i class="fas fa-plus-square" aria-hidden="true" ></i>
                </a>
              </h3>
            </div>
          </th>
        </tr>
    </thead>
    <tbody>
        @foreach($areas as $areas)
      <tr>
        <td>{{ $areas -> COD_AREA}} </td>
        <td>{{ $areas -> NOMBRE_AREA}} </td>
        <td>{{ $areas -> DESC_AREA}} </td>
        <td>
            <div class="text-center">
                <h4>
                  <a href='{{ route('areas.edit',$areas->id)}}' data-toggle="tooltip" data-placement="right" title="Editar">
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