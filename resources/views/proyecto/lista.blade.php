@extends('layouts.principal')
@section('titulo1', 'LISTA')
@section('titulo2', 'DE PERFILES')
@section('content')


{!! Form::open(array('url'=>'proyecto','method'=>'GET','class' => 'navbar-form pull-right')) !!}
<div class="input-group">

  {!! Form::text('nombre', null, ['class'=> 'form-control','placeholder'=>'Buscar perfil', 'aria-describedby'=>'buscar']) !!}


  <span class="input-group-btn">
    <button type="submit" class="btn btn-primary">Buscar</button>
  </span>
</div>
{!! Form::close() !!}


<div class="table-responsive">
<table class="table">
    <thead class="thead-light">
      <tr>
          <th scope="col">Título</th>
          <th scope="col">Gestión Registro</th>
          <th scope="col">Gestión Limite</th>
          <th scope="col">Fecha Asignación de Tribunal</th>
          <th scope="col">Fecha Defensa</th>
          <th scope="col">Gestion Prorroga</th>
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
        <td>{{ $proyecto -> TITULO_PERFIL}} </td>
        <td>{{ $proyecto -> GESTION_REGISTRO}} </td>
        <td>{{ $proyecto -> GESTION_LIMITE}} </td>
        <td>{{ $proyecto -> FECHA_INI}} </td>
        <td>{{ $proyecto -> FECHA_DEF}} </td>
        <td>{{ $proyecto -> GESTION_PRORROGA}} </td>
        <td>
            <div class="text-center">
                <h4>
                  <a href='{{ route('proyecto.edit',$proyecto->id)}}' >

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
              <a href='{{ route('tutor.index',$proyecto->id)}}' data-toggle="tooltip" data-placement="right" title="asignar Estudiante y Tutor">
                <i class="fas fa-trash-alt"aria-hidden="true"></i>
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
