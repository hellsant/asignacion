@extends('layouts.principal')
@section('titulo1', 'ACTUALIZAR')
@section('titulo2', 'INFORMACION DEL PERFIL')
@section('content')

<div>

    {!! Form::open(['route'=>['proyecto.update', $proyecto->id],'method'=>'patch']) !!}
   
    <div class="form-group row">
            {!! Form::label('TITULO_PERFIL','Titulo Perfil',['class'=>'col-sm-2 col-form-label']) !!}
            <div class="col-sm-10">
            {!! Form::text('TITULO_PERFIL', $proyecto->TITULO_PERFIL, ['class'=>'form-control','required' =>'true','minlength'=>'3']) !!}
            </div>
        </div>
        <div class="form-group row">
            {!! Form::label('FECHA_REGISTRO','Fecha de registro',['class'=>'col-sm-2 col-form-label']) !!}
            <div class="col-sm-10">
            {!! Form::date('FECHA_REGISTRO', $proyecto->FECHA_REGISTRO, ['class'=>'form-control','required' =>'true','minlength'=>'3']) !!}
            </div>
        </div>
        <div class="form-group row">
            {!! Form::label('FECHA_LIMITE','fecha limite',['class'=>'col-sm-2 col-form-label']) !!}
            <div class="col-sm-10">
            {!! Form::date('FECHA_LIMITE', $proyecto->FECHA_LIMITE, ['class'=>'form-control']) !!}
            </div>
        </div>
        <div class="form-group row">
            {!! Form::label('OBJ_GRAL','Objetivo General',['class'=>'col-sm-2 col-form-label']) !!}
            <div class="col-sm-10">
            {!! Form::text('OBJ_GRAL', $proyecto->OBJ_GRAL, ['class'=>'form-control','required' =>'true','minlength'=>'3']) !!}
            </div>
        </div>
        <div class="form-group row">
            {!! Form::label('OBJ_ESP','Objetivos Espesificos',['class'=>'col-sm-2 col-form-label']) !!}
            <div class="col-sm-10">
            {!! Form::text('OBJ_ESP', $proyecto->OBJ_ESP, ['class'=>'form-control']) !!}
            </div>
        </div>
        <div class="form-group row">
            {!! Form::label('DESCRIPCION','Descripcion',['class'=>'col-sm-2 col-form-label']) !!}
            <div class="col-sm-10">
            {!! Form::text('DESCRIPCION', $proyecto->DESCRIPCION, ['class'=>'form-control']) !!}
            </div>
        </div>
        <div class="form-group row">
            {!! Form::label('FECHA_INI','Fecha inicio',['class'=>'col-sm-2 col-form-label']) !!}
            <div class="col-sm-10">
            {!! Form::date('FECHA_INI', $proyecto->FECHA_INI, ['class'=>'form-control','required' =>'true']) !!}
            </div>
        </div>
        <div class="form-group row">
            {!! Form::label('FECHA_DEF','Fecha Defensa',['class'=>'col-sm-2 col-form-label']) !!}
            <div class="col-sm-10">
            {!! Form::date('FECHA_DEF', $proyecto->FECHA_DEF, ['class'=>'form-control','required' =>'true']) !!}
            </div>
        </div>
        <div class="form-group row">
            {!! Form::label('FECHA_PRORR','Fecha Prorroga',['class'=>'col-sm-2 col-form-label']) !!}
            <div class="col-sm-10">
            {!! Form::date('FECHA_PRORR', $proyecto->FECHA_PRORR, ['class'=>'form-control','required' =>'true']) !!}
            </div>
        </div>
        {!! Form::hidden('modalidad_id', $proyecto->modalidad_id) !!}

    {!! Form::submit('cancelar', ['route'=>'proyecto','class'=>'btn btn-danger']) !!}
    {!! Form::submit('actualizar', ['class'=>'btn btn-success']) !!}
    {!! Form::close() !!}
</div>
    
@endsection