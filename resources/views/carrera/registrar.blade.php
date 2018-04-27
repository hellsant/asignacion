@extends('layouts.principal')
@section('titulo1', 'REGISTRO')
@section('titulo2', 'DE CARRERAS')
@section('content')

<div>

    {!! Form::open(['route'=>'carrera.store','method'=>'POST test-form','data-parsley-validate'=>""]) !!}
    <div class="form-group row">
        {!! Form::label('COD_CARRERA','Codigo Carrera',['class'=>'col-sm-2 col-form-label']) !!}
        <div class="col-sm-10">
            {!! Form::number('COD_CARRERA', old('COD_CARRERA'),['class'=>'form-control',  'data-parsley-type'=>"number",'placeholder'=>"Ingrese el Codigo de la Carrera", 'required' =>'true','data-parsley-error-message'=>"Ingrese solo numeros",'required' =>'true']) !!}
        </div>
    </div>
    <div class="form-group row">
        {!! Form::label('NOM_CARRERA','Nombre',['class'=>'col-sm-2 col-form-label']) !!}
        <div class="col-sm-10">
            {!! Form::text('NOM_CARRERA', old('NOM_CARRERA'), ['class'=>'form-control', 'data-parsley-pattern'=>"^[a-zA-Z ]+$",'placeholder'=>"Ingrese el Nombre de la Carrera", 'required' =>'true','data-parsley-error-message'=>"Ingrese solo letras y espacios",'minlength'=>'3']) !!}
        </div>
    </div>
    {!! Form::submit('cancelar', ['route'=>'carrera','class'=>'btn btn-danger']) !!}
    {!! Form::submit('registrar', ['class'=>'btn btn-success']) !!}
    {!! Form::close() !!}
</div>
@endsection