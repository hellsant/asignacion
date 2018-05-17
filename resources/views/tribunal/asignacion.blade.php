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

<div>
    {!! Form::open(['route'=>['tribunal.store',''],'method'=>'patch','data-parsley-validate'=>""]) !!}
    <div class="form-group row">
        {!! Form::label('id','Codigo del perfil',['class'=>'col-sm-2 col-form-label']) !!}
        <div class="col-sm-10">
            {!! Form::number('id', 'id', ['class'=>'form-control','readonly']) !!}
        </div>
    </div>
    <div class="form-group row">
        {!! Form::label('Estudiante','Estudiante',['class'=>'col-sm-2 col-form-label']) !!}
        <div class="col-sm-10">
            {!! Form::number('Estudiante', 'id', ['class'=>'form-control','readonly']) !!}
        </div>
    </div>
    <div class="form-group row">
        {!! Form::label('nombre_perfil','Nombre del perfil',['class'=>'col-sm-2 col-form-label']) !!}
        <div class="col-sm-10">
            {!! Form::number('nombre_perfil', 'id', ['class'=>'form-control','readonly']) !!}
        </div>
    </div>

    <div class="form-group row">
            {!! Form::label('area','Area',['class'=>'col-sm-2 col-form-label']) !!}
            <div class="form-group col-sm-4">
                {!! Form::number('area', 'id', ['class'=>'form-control','readonly']) !!}
            </div>
            {!! Form::label('subArea','Subarea',['class'=>'col-sm-2 col-form-label']) !!}
            <div class="form-group col-sm-4">
                {!! Form::number('subArea', 'id', ['class'=>'form-control','readonly']) !!}
            </div>
        </div>
        <div class="form-group row">
            {!! Form::label('fecha_inicio','Fecha inicio',['class'=>'col-sm-2 col-form-label']) !!}
                <div class="form-group col-sm-4">
                    {!! Form::date('fecha_inicio', $now, ['class'=>'form-control']) !!}
                </div>
                {!! Form::label('gestion','gestion',['class'=>'col-sm-2 col-form-label']) !!}
                <div class="form-group col-sm-4">
                    {!! Form::select('gestion', $gestion,null, ['class'=>'form-control']) !!}
                </div>
        </div>
        <div class="form-group row">
            {!! Form::label('fecha_limite','Fecha limite',['class'=>'col-sm-2 col-form-label']) !!}
                <div class="form-group col-sm-4">
                    {!! Form::date('fecha_limite',$now->addYears(2) , ['class'=>'form-control','readonly']) !!}
                </div>
                {!! Form::label('gestion_fecha_limite','Gestion fecha limite',['class'=>'col-sm-2 col-form-label']) !!}
                <div class="form-group col-sm-4">
                    {!! Form::select('gestion_fecha_limite',$gestionLimite,null, ['class'=>'form-control']) !!}
                </div>
        </div>

        <table class="table">
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
                @foreach ($tribunales as $tribunal )
                <tr>
                    <td>{{ $tribunal -> id}} </td>
                    <td>{{ $tribunal -> NOMBRE}}</td>
                    <td>{{ $tribunal -> TUTOR}} </td>
                    <td>{{ $tribunal -> TRIBUNAL}}</td>
                    <td>
                        <div class="text-center">
                            {!! Form::checkbox('prueba', 'value') !!}
                        </div> 
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="form-group ">
            <a href="{{ route('tribunal.index') }}" class="btn btn-danger">Cancel</a>
            {!! Form::submit('Siguiente', ['type'=>"submit",'class'=>'btn btn-success', 'id'=>"btnreg"]) !!}
        </div>
        {!! Form::close() !!}
</div>
                
@endsection