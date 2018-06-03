@extends('layouts.principal')
@section('titulo1', 'LISTA')
@section('titulo2', 'DE PROFESIONALES')
@section('content')

{!! Form::open((array('url'=>'profesional','method'=>'GET','class' => 'navbar-form navbar-left pull-right'))) !!}

  <div class="input-group">

    {!! Form::text('nombre', null, ['class'=> 'form-control','placeholder'=>'Buscar profesional', 'aria-describedby'=>'buscar']) !!}

<!--    {!! Form::select('titulo',$titulos,$titulos,['class'=>'form-control']) !!} -->



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
          <th scope="col">Nombre</th>
          <th scope="col">Apellido Paterno</th>
          <th scope="col">Apellido Materno</th>
          <th scope="col">Teléfono</th>
          <th scope="col">Correo</th>
          <th></th>
          <th scope="col">
            <div class="text-center">
              <h3>
                <a href='{{ route('profesional.create')}}' data-toggle="tooltip" data-placement="right" title="Registar">
                  <i class="fas fa-plus-square" aria-hidden="true" ></i>
                </a>
              </h3>
            </div>
          </th>
        </tr>
    </thead>
    <tbody>
        @foreach($profesionales as $profesional)
      <tr>
        <td>{{ $profesional -> titulo->nombre}}</td>
        <td>{{ $profesional -> NOM_PROF}} </td>
        <td>{{ $profesional -> AP_PAT_PROF}} </td>
        <td>{{ $profesional -> AP_MAT_PROF}} </td>
        <td>{{ $profesional -> TELF_PROF}} </td>
        <td>{{ $profesional -> CORREO_PROF}} </td>
        <td>
          <div class="text-center">
              <h4>
                <a href='{{ route('profesional.edit',$profesional->id)}}' data-toggle="tooltip" data-placement="right" title="Editar">
                    <i class="fas fa-pencil-alt"aria-hidden="true"></i>
                </a>
            </h4>
          </div>
      </td>
            <div class="text-center">
                <h4>
                  <a href='{{ url('profesional.ocultar',$profesional->id)}}' onclick="return confirm('¿Esta seguro de eliminar este Profesional?')" data-toggle="tooltip" data-placement="right" title="Eliminar">
                      <i class="fas fa-trash-alt" aria-hidden="true"></i>
                  </a>
              </h4>
            </div>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
{!!$profesionales->appends(Request::only(['nombre']))->render("pagination::bootstrap-4")!!}

</div>

@endsection
