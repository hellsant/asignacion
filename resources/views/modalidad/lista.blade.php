@extends('layouts.principal')
@section('titulo1', 'LISTA')
@section('titulo2', 'DE MODALIDAMES')
@section('content')
<div class="table-responsive">
<table class="table">
    <thead class="thead-light">
      <tr>
          <th scope="col">Modalidad</th>
          <th scope="col">Descripcion</th>
          <th scope="col">
            <div class="text-center">
              <h3>
                <a href='{{ route('modalidad.create')}}' data-toggle="tooltip" data-placement="right" title="Registar">
                  <i class="fas fa-plus-square" aria-hidden="true" ></i>
                </a>
              </h3>
            </div>
          </th>
        </tr>
    </thead>
    <tbody>
        @foreach($modalidades as $modalidad)
      <tr>
        <td>{{ $modalidad -> NOM}} </td>
        <td>{{ $modalidad -> DESC}} </td>
        <td>
            <div class="text-center">
              <h4>
                <a href='{{ route('modalidad.edit',$modalidad->id)}}' data-toggle="tooltip" data-placement="right" title="Editar">
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