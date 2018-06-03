@extends('layouts.principal')
@section('titulo1', 'LISTA')
@section('titulo2', 'DE PERFILES')
@section('content')


{!! Form::open(array('url'=>'proyecto','method'=>'GET','class' => 'navbar-form pull-right')) !!}
<div class="input-group">

  {!! Form::text('busqueda', null, ['class'=> 'form-control','placeholder'=>'Buscar perfil', 'aria-describedby'=>'buscar']) !!}


  <span class="input-group-btn">
    <button type="submit" class="btn btn-primary">Buscar</button>
  </span>
</div>
{!! Form::close() !!}


<div class="table-responsive">
<table class="table">
    <thead class="thead-light">
      <tr>
          <th scope="col">Código</th>
          <th scope="col">Título</th>
          <th scope="col">Estudiante</th>
          <th scope="col">Tutor</th>
          <th scope="col">Tribunal</th>
          <th scope="col">Opciones</th>

          <th></th>
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
      <tr>
        <td>{{ $proyecto -> id}} </td>
        <td>{{ $proyecto -> TITULO_PERFIL}} </td>
        <td>{{ $proyecto -> estudiante->pluck('full_name', 'id')->implode(' ')}} </td>
        @foreach ($proyecto->estudiante as $e)
        <td>
          @foreach ($e->profesional as $p)

              {{ $p->NOM_PROF.' '.$p->AP_PAT_PROF.' '.$p->AP_MAT_PROF.',' }}

          @endforeach
        </td>


        @endforeach
        <td>{{ $proyecto -> profesional->pluck('full_name', 'id')->implode(',')}} </td>
        <td>
            <div class="text-center">
                <h4>
                  <a href='{{ route('proyecto.edit',$proyecto->id)}}' data-toggle="tooltip" data-placement="right" title="Editar">
                      <i class="fas fa-pencil-alt"aria-hidden="true"></i>
                  </a>
              </h4>
            </div>
        </td>

        <td>
            <div class="text-center">
                <h4>
                  <a href='{{ url('proyecto/ocultar',$proyecto->id)}}' onclick="return confirm('¿Esta seguro de eliminar este Proyecto?')" data-toggle="tooltip" data-placement="right" title="Eliminar">
                      <i class="fas fa-trash-alt" aria-hidden="true"></i>
                  </a>
              </h4>
            </div>
        </td>

        <td>
            <div class="text-center">
                <h4>
                  <a href='{{ route('tribunal.asignar',$e->id) }}' data-toggle="tooltip" data-placement="right" title="Asignar tribunales">
                      <i class="fas fa-gavel" aria-hidden="true"></i>
                  </a>
              </h4>
            </div>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
{!!$proyectos->appends(Request::only(['nombre']))->render("pagination::bootstrap-4")!!}

</div>

@endsection
