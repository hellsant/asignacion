@extends('layouts.principal')
@section('titulo1', 'REGISTRO')
@section('titulo2', 'DE PROFESIONALES')
@section('content')

<div>

    {!! Form::open(['route'=>'profesional.store','method'=>'POST','data-parsley-validate'=>""]) !!}
    <div class="form-group row">
        {!! Form::label('NOM_PROF','Nombre',['class'=>'col-sm-2 col-form-label']) !!}
        <div class="col-sm-10">
            {!! Form::text('NOM_PROF', old('NOM_PROF'), ['class'=>'form-control', 'data-parsley-pattern'=>"^[a-zA-Z ]+$",'placeholder'=>"Ingrese el Nombre del Profesional",'data-parsley-error-message'=>"Ingrese solo letras y espacios",'required' =>'true','minlength'=>'3']) !!}
        </div>
    </div>
    <div class="form-group row">
        {!! Form::label('AP_PAT_PROF','Apellido Paterno',['class'=>'col-sm-2 col-form-label']) !!}
        <div class="col-sm-10">
            {!! Form::text('AP_PAT_PROF', old('AP_PAT_PROF'), ['class'=>'form-control', 'data-parsley-pattern'=>"^[a-zA-Z ]+$",'placeholder'=>"Ingrese el Apellido Paterno",'data-parsley-error-message'=>"Ingrese solo letras y espacios",'required' =>'true','minlength'=>'3']) !!}
        </div>
    </div>
    <div class="form-group row">
        {!! Form::label('AP_MAT_PROF','Apellido Materno',['class'=>'col-sm-2 col-form-label']) !!}
        <div class="col-sm-10">
            {!! Form::text('AP_MAT_PROF', old('AP_MAT_PROF'), ['class'=>'form-control', 'data-parsley-pattern'=>"^[a-zA-Z ]+$",'placeholder'=>"Ingrese el Apellido Materno",'data-parsley-error-message'=>"Ingrese solo letras y espacios",'required' =>'true','minlength'=>'3']) !!}
        </div>
    </div>
    <div class="form-group row">
        {!! Form::label('TITULO_PROF','Titulo Profesional',['class'=>'col-sm-2 col-form-label']) !!}
        <div class="col-sm-10">
            {!! Form::select('TITULO_PROF', $titulo,$titulo, ['class'=>'form-control']) !!}
        </div>
    </div>
    <div class="form-group row">
        {!! Form::label('TELF_PROF','Telefono',['class'=>'col-sm-2 col-form-label']) !!}
        <div class="col-sm-10">
            {!! Form::text('TELF_PROF', old('TELF_PROF'), ['class'=>'form-control', 'data-parsley-type'=>"number",'placeholder'=>"Ingrese el Telefono",'data-parsley-error-message'=>"Ingrese solo numeros"]) !!}
        </div>
    </div>
    <div class="form-group row">
        {!! Form::label('CI_PROF','CI',['class'=>'col-sm-2 col-form-label']) !!}
        <div class="col-sm-10">
            {!! Form::text('CI_PROF', old('CI_PROF'), ['class'=>'form-control', 'data-parsley-type'=>"number",'placeholder'=>"Ingrese el CI",'data-parsley-error-message'=>"Ingrese solo numeros",'required' =>'true']) !!}
        </div>
    </div>

    <div class="form-group row">
        {!! Form::label('Tipo','Tipo',['class'=>'col-sm-2 col-form-label']) !!}
        <div class="col-sm-10">
            {!! Form::select('Tipo',array('Interno' => 'Interno', 'Externo' => 'Exteno'), 'Interno',['class'=>'form-control']) !!}
        </div>
    </div>
    <div class="form-group row">
        {!! Form::label('CORREO_PROF','Correo',['class'=>'col-sm-2 col-form-label']) !!}
        <div class="col-sm-10">
            {!! Form::email('CORREO_PROF', old('CORREO_PROF'), ['class'=>'form-control', 'data-parsley-type'=>"email",'placeholder'=>"Ingrese un correo",'data-parsley-error-message'=>"null",'required' =>'true']) !!}
        </div>
    </div>
    <a href="{{ route('profesional.index') }}" class="btn btn-danger">Cancel</a>
    {!! Form::submit('registrar', ['class'=>'btn btn-success']) !!}
    {!! Form::close() !!}
</div>
@endsection
