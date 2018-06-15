@extends('layouts.principal')
@section('titulo1', 'LISTA')
@section('titulo2', 'DE PROFESIONALES')
@section('content')

{!! Form::open(['route'=>['subarea.profesional', $s],'method'=>'GET','class' => 'navbar-form navbar-left pull-right']) !!}

  {!! Form::close() !!}

  <div class="form-group row">
      {!! Form::label('SUBAREA','Subárea',['class'=>'col-sm-2 col-form-label']) !!}
      <div class="col-sm-10">
          {!! Form::label('nombre', $subarea->NOMBRE_SUBAREA, ['class'=>'form-control','readonly']) !!}
      </div>
  </div>

  <div class="form-group row">
      {!! Form::label('COD_SUBAREA','Código de subárea',['class'=>'col-sm-2 col-form-label']) !!}
      <div class="col-sm-10">
          {!! Form::label('codigo', $subarea->id, ['class'=>'form-control','readonly']) !!}
      </div>
  </div>

<div class="table-responsive">
<table class="table" id="table_id">
    <thead class="thead-light">
      <tr>
          <th scope="col">Título</th>
          <th scope="col">Nombre</th>
          <th scope="col">Apellido Paterno</th>
          <th scope="col">Apellido Materno</th>
          <th scope="col">Teléfono</th>
          <th scope="col">Correo</th>

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

      @foreach($subarea->profesional as $profesional)
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
                      <a href='{{ route('subarea.ocultarProfesional',['idprofesional'=>$profesional->id,'idsubarea'=>$subarea->id]) }}' data-toggle="tooltip" data-placement="right" title="Eliminar">
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
