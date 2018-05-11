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
        {!! Form::label('id','Estudiante',['class'=>'col-sm-2 col-form-label']) !!}
        <div class="col-sm-10">
            {!! Form::number('id', 'id', ['class'=>'form-control','readonly']) !!}
        </div>
    </div>
    <div class="form-group row">
        {!! Form::label('id','Nombre del perfil',['class'=>'col-sm-2 col-form-label']) !!}
        <div class="col-sm-10">
            {!! Form::number('id', 'id', ['class'=>'form-control','readonly']) !!}
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            {!! Form::label('id','Area',['class'=>'col-sm-2 col-form-label']) !!}
                {!! Form::number('id', 'id', ['class'=>'form-control','readonly']) !!}
            </div>
            <div class="form-group col-md-6">
                {!! Form::label('id','Subarea',['class'=>'col-sm-2 col-form-label']) !!}
                {!! Form::number('id', 'id', ['class'=>'form-control','readonly']) !!}
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