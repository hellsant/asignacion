@extends('layouts.principal')
@section('titulo1', 'LISTA')
@section('titulo2', 'DE AREAS')
@section('content')

<div class="table-responsive">
<table class="table" id="table_id">
    <thead class="thead-light">
      <tr>
          <th scope="col">Codigo</th>
          <th scope="col">Nombre</th>
          <th scope="col">Descripcion</th>
          <th></th>
          <th></th>
          <th scope="col">
            <div class="text-center">
              <h3>
                <a href='{{ route('area.create')}}' data-toggle="tooltip" data-placement="right" title="Registar">
                  <i class="fas fa-plus-square" aria-hidden="true" ></i>
                </a>
              </h3>
            </div>
          </th>
        </tr>
    </thead>
    <tbody>
        @foreach($areas as $area)
      <tr>
        <td>{{ $area -> id}} </td>
        <td>{{ $area -> NOMBRE_AREA}} </td>
        <td>{{ $area -> DESC_AREA}} </td>
        <td>
            <div class="text-center">
              <h4>
                <a href='{{ route('area.edit',$area->id)}}' data-toggle="tooltip" data-placement="right" title="Editar">
                  <i class="fas fa-pencil-alt"aria-hidden="true"></i>
                </a>
              </h4>
            </div>
        </td>
        <td>
            <div class="text-center">
              <h4>
                <a href='{{ route('subarea.recibe',$area->id) }}' data-toggle="tooltip" data-placement="right" title="Registar Subarea">
                  <i class="fas fa-plus-square" aria-hidden="true"></i>
                </a>
              </h4>
            </div>
        </td>
        <td>
            <div class="text-center">
                <h4>
                  <a href='{{ url('area/ocultar',$area->id)}}' onclick="return confirm('¿Esta seguro de eliminar esta Area?')" data-toggle="tooltip" data-placement="right" title="Eliminar">
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
