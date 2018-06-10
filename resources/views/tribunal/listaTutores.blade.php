@extends('layouts.principal')
@section('titulo1', 'LISTA')
@section('titulo2', ' DE PROYECTOS DEL PROFESIONAL COMO TUTOR')
@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div><br />
@endif

<div class="form-group">
    {!! Form::open(['route'=>'tribunal.index','method'=>'GET']) !!}
    <div class="form-group row">
        {!! Form::label('id_profesional','ID Profesional',['class'=>'col-sm-2 col-form-label']) !!}
        <div class="col-sm-10">
            {!! Form::number('id_profesional', $profesional->id, ['class'=>'form-control','readonly']) !!}
        </div>
    </div>
    <div class="form-group row">
        {!! Form::label('profesional','Profesional',['class'=>'col-sm-2 col-form-label']) !!}
        <div class="col-sm-10">
           
            {!! Form::text('profesional', "$profesional->NOM_PROF $profesional->AP_PAT_PROF $profesional->AP_MAT_PROF" , ['class'=>'form-control','readonly']) !!}
        </div>
    </div>
    
    <div class="form-group row">
        {!! Form::label('area','Area',['class'=>'col-sm-2 col-form-label']) !!}
        <div class="form-group col-sm-4">
                       
            @foreach ($areas as $area)
            {!! Form::text('area', $area->NOMBRE_AREA, ['class'=>'form-control','readonly']) !!}
            @endforeach
        </div>
        {!! Form::label('subArea','Subarea',['class'=>'col-sm-2 col-form-label']) !!}
        <div class="form-group col-sm-4">
                @foreach ($subareas as $subarea)
                {!! Form::text('area', $subarea->NOM_SUBAREA, ['class'=>'form-control','readonly']) !!}
                @endforeach
        </div>
    </div>
    <div class="table-responsive">
        <table class="table" id="table_id">
            <thead class="thead-light">
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Estudiante</th>
                    <th scope="col">Titulo del Proyecto</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($estudiantes as $estudiante)
                <tr>
                    <td>
                        {{ $estudiante->id }}
                    </td>
                    <td>{{ $estudiante->NOM_EST}} {{ $estudiante->AP_PAT_EST}} {{ $estudiante->AP_MAT_EST}}</td>
                    <td>
                        @foreach ( $estudiante->proyectos as $proyecto )
                        {{ $proyecto->TITULO_PERFIL }}
                        @endforeach
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
        <div class="form-group ">
            <a href="{{ route('proyecto.index') }}" class="btn btn-danger">Cancel</a>
        </div>
        {!! Form::close() !!}
    </div>
    @endsection
