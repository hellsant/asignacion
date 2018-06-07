@extends('layouts.principal')
@section('titulo1', 'LISTA')
@section('titulo2', 'DE SUBAREAS')
@section('content')


{!! Form::open(['route'=>['subarea.index','method'=>'GET']]) !!}
<div class="table-responsive">
<table class="table" id="table_id">
    <thead class="thead-light">
      <tr>
          <th scope="col">Codigo</th>
          <th scope="col">Nombre</th>
          <th scope="col">Descripcion</th>
          <th scope="col">Area</th>
          <th></th>

    </thead>
    <tbody>
      @foreach($subareas as $subarea)
      <tr>
        <td>{{ $subarea -> COD_SUBAREA}} </td>
        <td>{{ $subarea -> NOMBRE_SUBAREA}} </td>
        <td>{{ $subarea -> DESC_SUBAREA}} </td>
        <td>{{ $subarea->area->NOMBRE_AREA}}</<td>
        <td>
            <div class="text-center">
                <h4>
                  <a href='{{ route('subarea.edit',$subarea->id)}}' data-toggle="tooltip" data-placement="right" title="Editar">
                      <i class="fas fa-pencil-alt"aria-hidden="true"></i>
                  </a>
              </h4>
            </div>
        </td>
        <td>
            <div class="text-center">
                <h4>
                  <a href='{{ url('subarea/ocultar',$subarea->id)}}' onclick="return confirm('¿Esta seguro de eliminar esta Subarea?')" data-toggle="tooltip" data-placement="right" title="Eliminar">
                      <i class="fas fa-trash-alt" aria-hidden="true"></i>
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
