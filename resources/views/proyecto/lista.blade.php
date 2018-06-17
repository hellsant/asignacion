@extends('layouts.principal')
@section('titulo1', 'LISTA')
@section('titulo2', 'DE PERFILES')
@section('content')

<div class="table-responsive">
  <table class="table" id="table_id">
    <thead class="thead-light">
      <tr>
        <th scope="col">Código</th>
        <th scope="col">Título</th>
        <th scope="col">Estudiante</th>
        <th scope="col">Tutor</th>
        <th scope="col">Tribunal</th>
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
      @if ($proyecto->CICLO == 'en progreso')
      <tr>
        <td>{{ $proyecto -> id}} </td>
        <td>{{ $proyecto -> TITULO_PERFIL}} </td>
        <td>{{ $proyecto -> estudiante->pluck('full_name', 'id')->implode(' ')}} </td>
        <td>
          @foreach ($proyecto->estudiante as $e)
          @foreach ($e->profesional as $p)
          {{ $p->NOM_PROF.' '.$p->AP_PAT_PROF.' '.$p->AP_MAT_PROF.',' }}
          @endforeach
          @endforeach
        </td>
        <td>
          @foreach ($proyecto->profesional as $tribunal)
          {{ $tribunal->NOM_PROF.' '.$tribunal->AP_PAT_PROF.' '.$tribunal->AP_MAT_PROF.','}}
          @endforeach
        </td>
        <td>
          <div class="text-center">
            <h4>
              <a href='{{ route('proyecto.edit',$proyecto->id)}}' data-toggle="tooltip" data-placement="right" title="Editar">
                <i class="fas fa-pencil-alt"aria-hidden="true"></i>
              </a>
              <a href='{{ route('tribunal.asignar',$proyecto->id) }}' data-toggle="tooltip" data-placement="right" title="Asignar tribunales">
                <i class="fas fa-gavel" aria-hidden="true"></i>
              </a>
              <a href='{{ route('proyecto.finalizar',$proyecto->id) }}' data-toggle="tooltip" data-placement="right" title="finalizar ciclo">
                <i class="fa fa-clipboard" aria-hidden="true"></i>
              </a>
              <a href='{{ url('proyecto/ocultar',$proyecto->id)}}' onclick="return confirm('¿Esta seguro de eliminar este Proyecto?')" data-toggle="tooltip" data-placement="right" title="Eliminar">
                <i class="fas fa-trash-alt" aria-hidden="true"></i>
              </a>
            </h4>
          </div>
        </td>
      </tr>
      @endif
      @endforeach
    </tbody>
  </table>
</div>
@endsection
