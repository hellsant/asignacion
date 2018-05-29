@extends('layouts.principal')
@section('titulo1', 'LISTA')
@section('titulo2', 'DE ESTUDIANTES')
@section('content')
<div>
  {!! Form::open(array('url'=>'estudiante','method'=>'GET','class' => 'navbar-form pull-right')) !!}

    <div class="input-group">

      {!! Form::text('nombre', null, ['class'=> 'form-control','placeholder'=>'Buscar estudiante', 'aria-describedby'=>'buscar']) !!}


      <span class="input-group-btn">
        <button type="submit" class="btn btn-primary">Buscar</button>
      </span>
    </div>
    {!! Form::close() !!}


{{Form::close()}}
</div>
<div class="table-responsive table-striped">
<table class="table">
    <thead class="thead-light">
      <tr>
          <th >CódigoSis</th>
          <th >Nombre</th>
          <th >Apellido Paterno</th>
          <th >Apellido Materno</th>
          <th >Teléfono</th>
          <th >Correo</th>
          <th ></th>
          <th ></th>

          <th scope="col">
            <div class="text-center">
              <h3>
                <a href='{{ route('estudiante.create')}}' data-toggle="tooltip" data-placement="right" title="Registar">
                  <i class="fas fa-plus-square" aria-hidden="true" ></i>
                </a>
              </h3>
            </div>
          </th>
        </tr>
    </thead>
    <tbody>
        @foreach($estudiantes as $estudiante)
      <tr>
        <td>{{ $estudiante -> COD_SIS}} </td>
        <td>{{ $estudiante -> NOM_EST}} </td>
        <td>{{ $estudiante -> AP_PAT_EST}} </td>
        <td>{{ $estudiante -> AP_MAT_EST}} </td>
        <td>{{ $estudiante -> TELF}} </td>
        <td>{{ $estudiante -> CORRETO_EST}} </td>
        <td></td>
        <td>
            <div class="text-center">
                <h4>
                  <a href='{{ route('estudiante.edit',$estudiante->id)}}' data-toggle="tooltip" data-placement="right" title="Editar">
                      <i class="fas fa-pencil-alt"aria-hidden="true"></i>
                  </a>
              </h4>
            </div>
        </td>
        <td>
            <div class="text-center">
                <h4>
                  <a href='{{ url('estudiante.ocultar',$estudiante->id)}}' onclick="return confirm('¿Esta seguro de eliminar este Estudiante?')" data-toggle="tooltip" data-placement="right" title="Eliminar">
                      <i class="fas fa-trash-alt" aria-hidden="true"></i>
                  </a>
              </h4>
            </div>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
{!!$estudiantes->appends(Request::only(['nombre']))->render("pagination::bootstrap-4")!!}
</div>

@endsection
