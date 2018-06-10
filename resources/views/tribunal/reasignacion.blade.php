@extends('layouts.principal')
@section('titulo1', 'ASIGNACION')
@section('titulo2', 'DE TRIBUNALES')
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
    {!! Form::open(['route'=>'tribunal.store','method'=>'POST']) !!}
    <div class="form-group row">
        {!! Form::label('id_perfil','Codigo del Proyecto',['class'=>'col-sm-2 col-form-label']) !!}
        <div class="col-sm-10">
            {!! Form::number('id_perfil', $proyectos->id, ['class'=>'form-control','readonly']) !!}
        </div>
    </div>
    <div class="form-group row">
        {!! Form::label('Estudiante','Estudiante',['class'=>'col-sm-2 col-form-label']) !!}
        <div class="col-sm-10">
            @foreach ( $estudiantes as $estudiante )
            {!! Form::text('Estudiante', "$estudiante->NOM_EST $estudiante->AP_PAT_EST $estudiante->AP_MAT_EST" , ['class'=>'form-control','readonly']) !!}
            @endforeach
        </div>
    </div>
    <div class="form-group row">
        {!! Form::label('nombre_perfil','Nombre del Proyecto',['class'=>'col-sm-2 col-form-label']) !!}
        <div class="col-sm-10">
            {!! Form::text('nombre_perfil', $proyectos -> TITULO_PERFIL, ['class'=>'form-control','readonly']) !!}
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
    <div class="form-group row">
        {!! Form::label('FECHA_INI','Fecha Registro Tribunal',['class'=>'col-sm-2 col-form-label']) !!}
        <div class="form-group col-sm-4">
            {!! Form::date('FECHA_INI', $now, ['class'=>'form-control']) !!}
        </div>

        {!! Form::label('fecha_registro','Fecha Registro Proyecto',['class'=>'col-sm-2 col-form-label']) !!}
        <div class="form-group col-sm-4">
            {!! Form::date('fecha_registro',$proyectos -> FECHA_REGISTRO, ['class'=>'form-control','readonly']) !!}
        </div>
    </div>
    <div class="table-responsive">
        <table class="table" id="table_id">
            <thead class="thead-light">
                <tr>
                    <th scope="col">Codigo</th>
                    <th scope="col">Docente</th>
                    <th scope="col">Tutor</th>
                    <th scope="col">Tribunal</th>
                    <th scope="col">Seleccionar</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($areas as $area)
                @foreach ($area->profesional as $tribunal)
                @if ($tribunal->id != $tribunalId)
                <tr>
                    <td>{{ $tribunal->id }}</td>
                    <td>{{ $tribunal->NOM_PROF }} {{ $tribunal->AP_PAT_PROF }} {{ $tribunal->AP_MAT_PROF }}</td>
                    <td>
                        @foreach ($tutores as $tutor)
                        @if ($tribunal -> id == $tutor->id )
                        {{ $tutor -> tutor}}
                        @endif
                        @endforeach
                    </td>
                    <td>
                        @foreach ($tribunalesN as $t )
                        @if ($t->id == $tribunal->id)
                        {{ $t -> tribunal}}
                        @endif
                        @endforeach
                    </td>
                    <td>
                        <div class="text-center">
                            {!! Form::checkbox('docenteTrinunal[]', $tribunal -> id) !!}
                        </div>
                    </td>
                </tr>
                @endif
                @endforeach
                @endforeach
            </tbody>
        </table>
    </div>
        <div class="form-group ">
            <a href="{{ route('tribunal.index') }}" class="btn btn-danger">Cancel</a>
            {!! Form::submit('Siguiente', ['type'=>"submit",'class'=>'btn btn-success', 'id'=>"btnreg"]) !!}
        </div>
        {!! Form::close() !!}
    </div>
    @endsection
