@extends('layouts.principal')
@section('titulo1', 'REGISTRO')
@section('titulo2', 'DE PERFILES')
@section('content')

<div>

    {!! Form::open(['route'=>'proyecto.store','method'=>'POST']) !!}
    <div class="form-group row">
        {!! Form::label('TITULO_PERFIL','Titulo Perfil',['class'=>'col-sm-2 col-form-label']) !!}
        <div class="col-sm-10">
            {!! Form::text('TITULO_PERFIL', old('TITULO_PERFIL'), ['class'=>'form-control','required' =>'true','minlength'=>'3']) !!}
        </div>
    </div>
    <div class="form-group row">
        {!! Form::label('FECHA_REGISTRO','Fecha de registro',['class'=>'col-sm-2 col-form-label']) !!}
        <div class="col-sm-10">
            {!! Form::date('FECHA_REGISTRO', old('FECHA_REGISTRO'), ['class'=>'form-control','required' =>'true','minlength'=>'3']) !!}
        </div>
    </div>
    <div class="form-group row">
        {!! Form::label('FECHA_LIMITE','fecha limite',['class'=>'col-sm-2 col-form-label']) !!}
        <div class="col-sm-10">
            {!! Form::date('FECHA_LIMITE', old('FECHA_LIMITE'), ['class'=>'form-control']) !!}
        </div>
    </div>
    <div class="form-group row">
        {!! Form::label('OBJ_GRAL','Objetivo General',['class'=>'col-sm-2 col-form-label']) !!}
        <div class="col-sm-10">
            {!! Form::text('OBJ_GRAL', old('OBJ_GRAL'), ['class'=>'form-control','required' =>'true','minlength'=>'3']) !!}
        </div>
    </div>
    <div class="form-group row">
            {!! Form::label('Tipo','Tipo',['class'=>'col-sm-2 col-form-label']) !!}
            <div class="col-sm-10">
                {!! Form::select('Tipo',array('Adscripcion' => 'Adscripcion', 'Tesis' => 'Tesis',
                'Proyecto de Grado'=>'Proyecto de Grado','Trabajo Dirigido'=>'Trabajo Dirigido','Titulacion Por Exelencia'=>'Titulacion Por Exelencia')
                , 'Proyecto de Grado',['class'=>'form-control']) !!}
            </div>
        </div>
    <div class="form-group row">
        {!! Form::label('OBJ_ESP','Objetivos Espesificos',['class'=>'col-sm-2 col-form-label']) !!}
        <div class="col-sm-10">
            {!! Form::text('OBJ_ESP', old('OBJ_ESP'), ['class'=>'form-control']) !!}
        </div>
    </div>
    <div class="form-group row">
        {!! Form::label('DESCRIPCION','Descripcion',['class'=>'col-sm-2 col-form-label']) !!}
        <div class="col-sm-10">
            {!! Form::text('DESCRIPCION', old('DESCRIPCION'), ['class'=>'form-control']) !!}
        </div>
    </div>
    <div class="form-group row">
        {!! Form::label('FECHA_INI','Fecha inicio',['class'=>'col-sm-2 col-form-label']) !!}
        <div class="col-sm-10">
            {!! Form::date('FECHA_INI', old('FECHA_INI'), ['class'=>'form-control','required' =>'true']) !!}
        </div>
    </div>
    <div class="form-group row">
        {!! Form::label('FECHA_DEF','Fecha Defensa',['class'=>'col-sm-2 col-form-label']) !!}
        <div class="col-sm-10">
            {!! Form::date('FECHA_DEF', old('FECHA_DEF'), ['class'=>'form-control','required' =>'true']) !!}
        </div>
    </div>
    <div class="form-group row">
        {!! Form::label('FECHA_PRORR','Fecha Prorroga',['class'=>'col-sm-2 col-form-label']) !!}
        <div class="col-sm-10">
            {!! Form::date('FECHA_PRORR', old('FECHA_PRORR'), ['class'=>'form-control','required' =>'true']) !!}
        </div>
    </div>
    {!! Form::submit('cancelar', ['route'=>'proyecto','class'=>'btn btn-danger']) !!}
    {!! Form::submit('registrar', ['class'=>'btn btn-success']) !!}
    {!! Form::close() !!}
</div>
@endsection