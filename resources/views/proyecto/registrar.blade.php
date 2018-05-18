@extends('layouts.principal')
@section('titulo1', 'REGISTRO')
@section('titulo2', 'DE PERFILES')
@section('content')

<div>

    {!! Form::open(['route'=>'proyecto.store','method'=>'POST']) !!}
    <div class="form-group row">
        {!! Form::label('TITULO_PERFIL','Titulo Perfil',['class'=>'col-sm-2 col-form-label']) !!}
        <div class="col-sm-10">
            {!! Form::text('TITULO_PERFIL', old('TITULO_PERFIL'), ['class'=>'form-control', 'data-parsley-pattern'=>"^[a-zA-Z ]+$",'placeholder'=>"Ingrese el Titulo del Perfil",'data-parsley-error-message'=>"Ingrese solo letras y espacios",'required' =>'true','minlength'=>'3']) !!}
        </div>
    </div>
    <div class="form-group row">
        {!! Form::label('FECHA_REGISTRO','Fecha de registro',['class'=>'col-sm-2 col-form-label']) !!}
        <div class="form-group col-sm-4">
            {!! Form::date('FECHA_REGISTRO', $now, ['class'=>'form-control']) !!}
        </div>
    
            {!! Form::label('MODALIDAD','Modalidad',['class'=>'col-sm-2 col-form-label']) !!}
            <div class="form-group col-sm-4">
                {!! Form::select('MODALIDAD',$listaMonbres, $listaMonbres ,['class'=>'form-control']) !!}
            </div>
        </div>
    <div class="form-group row">
        {!! Form::label('GESTION_REGISTRO','Gestión Registro',['class'=>'col-sm-2 col-form-label']) !!}
        <div class="form-group col-sm-4">
            {!! Form::select('GESTION_REGISTRO', $gestionRegistro,$gestionRegistro, ['class'=>'form-control']) !!}
        </div>
    
        {!! Form::label('GESTION_LIMITE','Gestión Limite',['class'=>'col-sm-2 col-form-label']) !!}
        <div class="form-group col-sm-4">
            {!! Form::select( 'GESTION_LIMITE', $gestionLimite,  $gestionLimite, ['class'=>'form-control']) !!}
        </div>
    </div>
    <div class="form-group row">
        {!! Form::label('OBJ_GRAL','Objetivo General',['class'=>'col-sm-2 col-form-label']) !!}
        <div class="col-sm-10">
            {!! Form::text('OBJ_GRAL', old('OBJ_GRAL'), ['class'=>'form-control', 'data-parsley-pattern'=>"^[a-zA-Z ]+$",'placeholder'=>"Ingrese el Objetivo General",'data-parsley-error-message'=>"Ingrese solo letras y espacios",'required' =>'true','minlength'=>'3']) !!}
        </div>
    </div>
   
    <div class="form-group row">
        {!! Form::label('OBJ_ESP','Objetivos Especificos',['class'=>'col-sm-2 col-form-label']) !!}
        <div class="col-sm-10">
            {!! Form::text('OBJ_ESP', old('OBJ_ESP'), ['class'=>'form-control', 'data-parsley-pattern'=>"^[a-zA-Z ]+$",'placeholder'=>"Ingrese Objetivos Especificos",'data-parsley-error-message'=>"Ingrese solo letras y espacios"]) !!}
        </div>
    </div>
    <div class="form-group row">
        {!! Form::label('DESCRIPCION','Descripcion',['class'=>'col-sm-2 col-form-label']) !!}
        <div class="col-sm-10">
            {!! Form::text('DESCRIPCION', old('DESCRIPCION'), ['class'=>'form-control', 'data-parsley-pattern'=>"^[a-zA-Z ]+$",'placeholder'=>"Ingrese la Descripcion",'data-parsley-error-message'=>"Ingrese solo letras y espacios"]) !!}
        </div>
    </div>
   
    <a href="{{ route('proyecto.index') }}" class="btn btn-danger">Cancel</a>
    {!! Form::submit('registrar', ['class'=>'btn btn-success']) !!}
    {!! Form::close() !!}
</div>
@endsection