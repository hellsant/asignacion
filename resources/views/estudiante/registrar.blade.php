@extends('layouts.principal')
@section('titulo1', 'REGISTRO')
@section('titulo2', 'DE ESTUDIANTES')
@section('content')

<div>
    {!! Form::open(['route'=>'estudiante.store','method'=>'POST test-form','data-parsley-validate'=>""]) !!}
    <div class="form-group row">
        {!! Form::label('COD_SIS','Codigo SIS',['class'=>'col-sm-2 col-form-label']) !!}
        <div class="col-sm-10">
            {!! Form::number('COD_SIS', old('COD_SIS'), ['class'=>'form-control',  'data-parsley-type'=>"number",'placeholder'=>"Ingrese el Codigo Sis", 'required' =>'true','data-parsley-error-message'=>"Ingrese solo numeros",'required' =>'true']) !!}
        </div>
    </div>
    <div class="form-group row">
        {!! Form::label('NOM_EST','Nombre',['class'=>'col-sm-2 col-form-label']) !!}
        <div class="col-sm-10">
            {!! Form::text('NOM_EST', old('NOM_EST'), ['class'=>'form-control', 'data-parsley-pattern'=>"^[a-zA-Z ]+$",'placeholder'=>"Ingrese el Nombre", 'required' =>'true','data-parsley-error-message'=>"Ingrese solo letras y espacios",'minlength'=>'3']) !!}
        </div>
    </div>
    <div class="form-group row">
        {!! Form::label('AP_PAT_EST','Apellido Paterno',['class'=>'col-sm-2 col-form-label','control-label']) !!}
        <div class="col-sm-10">
            {!! Form::text('AP_PAT_EST', old('AP_PAT_EST'), ['class'=>'form-control', 'data-parsley-pattern'=>"^[a-zA-Z ]+$",'placeholder'=>"Ingrese el Apellido Paterno", 'required' =>'true','data-parsley-error-message'=>"Ingrese solo letras y espacios",'minlength'=>'3']) !!}
        </div>
    </div>
    <div class="form-group row">
        {!! Form::label('AP_MAT_EST','Apellido Materno',['class'=>"col-sm-2 col-form-label control-label"]) !!}
        <div class="col-sm-10">
            {!! Form::text('AP_MAT_EST', old('AP_MAT_EST'), ['class'=>'form-control', 'data-parsley-pattern'=>"^[a-zA-Z ]+$",'placeholder'=>"Ingrese el Apellido Materno", 'data-parsley-error-message'=>"Ingrese solo letras y espacios",'minlength'=>'3']) !!}
        </div>
    </div>
    <div class="form-group row">
        {!! Form::label('CI','CI',['class'=>'col-sm-2 col-form-label control-label','data-smk-icon'=>"glyphicon-remove"]) !!}
        <div class="col-sm-10">
            {!! Form::number('CI', old('CI'), ['class'=>'form-control',  'data-parsley-type'=>"number",'placeholder'=>"Ingrese el CI", 'required' =>'true','data-parsley-error-message'=>"Ingrese solo numeros",'required' =>'true']) !!}
        </div>
    </div>
    <div class="form-group row">
        {!! Form::label('TELF','TELF',['class'=>'col-sm-2 col-form-label control-label','data-smk-icon'=>"glyphicon-remove"]) !!}
        <div class="col-sm-10">
            {!! Form::number('TELF', old('TELF'), ['class'=>'form-control',  'data-parsley-type'=>"number",'placeholder'=>"Ingrese el Telefono", 'required' =>'true','data-parsley-error-message'=>"Ingrese solo numeros",'required' =>'true']) !!}
        </div>
    </div>
    <div class="form-group row">
        {!! Form::label('CORRETO_EST','Correo',['class'=>'col-sm-2 col-form-label']) !!}
        <div class="col-sm-10">
            {!! Form::email('CORRETO_EST', old('CORRETO_EST'), ['class'=>'form-control',  'data-parsley-type'=>"email",'placeholder'=>"Ingrese un correo",'data-parsley-error-message'=>"null",'required' =>'true']) !!}
        </div>
    </div>
    <div class="form-group pull-right">
        <a href="{{ route('estudiante.index') }}" class="btn btn-danger">Cancel</a>
        {!! Form::submit('registrar', ['type'=>"submit",'class'=>'btn btn-success', 'id'=>"btnreg"]) !!}
        
    </div>
    {!! Form::close() !!}
    
</div>
@endsection



