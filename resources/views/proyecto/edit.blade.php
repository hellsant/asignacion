@extends('layouts.principal')
@section('titulo1', 'ACTUALIZAR')
@section('titulo2', 'INFORMACION DEL PERFIL')
@section('content')

<div>

    {!! Form::open(['route'=>['proyecto.update', $proyecto->id],'method'=>'patch']) !!}
    $profecional->DIREC_PROF
    <div class="form-group row">
            {!! Form::label('TITULO_PERFIL','Titulo Perfil',['class'=>'col-sm-2 col-form-label']) !!}
            <div class="col-sm-10">
                {!! Form::text('TITULO_PERFIL', $proyectos->TITULO_PERFIL, ['class'=>'form-control','required' =>'true','minlength'=>'3']) !!}
            </div>
        </div>
        <div class="form-group row">
            {!! Form::label('FECHA_REGISTRO','Fecha de registro',['class'=>'col-sm-2 col-form-label']) !!}
            <div class="col-sm-10">
                {!! Form::date('FECHA_REGISTRO', $proyectos->FECHA_REGISTRO, ['class'=>'form-control','required' =>'true','minlength'=>'3']) !!}
            </div>
        </div>
        <div class="form-group row">
            {!! Form::label('FECHA_LIMITE','fecha limite',['class'=>'col-sm-2 col-form-label']) !!}
            <div class="col-sm-10">
                {!! Form::date('FECHA_LIMITE', $proyectos->FECHA_LIMITE, ['class'=>'form-control']) !!}
            </div>
        </div>
        <div class="form-group row">
            {!! Form::label('OBJ_GRAL','Objetivo General',['class'=>'col-sm-2 col-form-label']) !!}
            <div class="col-sm-10">
                {!! Form::text('OBJ_GRAL', $proyectos->OBJ_GRAL, ['class'=>'form-control','required' =>'true','minlength'=>'3']) !!}
            </div>
        </div>
        <div class="form-group row">
                {!! Form::label('Tipo','Tipo',['class'=>'col-sm-2 col-form-label']) !!}
                <div class="col-sm-10">
                    {!! Form::select('Tipo',array('Adscripcion' => 'Adscripcion', 'Tesis' => 'Tesis',
                    'Proyecto de Grado'=>'Proyecto de Grado','Trabajo Dirigido'=>'Trabajo Dirigido','Titulacion Por Exelencia'=>'Titulacion Por Exelencia')
                    , 'Tesis',['class'=>'form-control']) !!}
                </div>
            </div>
        <div class="form-group row">
            {!! Form::label('OBJ_ESP','Objetivos Espesificos',['class'=>'col-sm-2 col-form-label']) !!}
            <div class="col-sm-10">
                {!! Form::text('OBJ_ESP', $proyectos->OBJ_ESP, ['class'=>'form-control']) !!}
            </div>
        </div>
        <div class="form-group row">
            {!! Form::label('DESCRIPCION','Descripcion',['class'=>'col-sm-2 col-form-label']) !!}
            <div class="col-sm-10">
                {!! Form::text('DESCRIPCION', $proyectos->DESCRIPCION, ['class'=>'form-control']) !!}
            </div>
        </div>
        <div class="form-group row">
            {!! Form::label('FECHA_INI','Fecha inicio',['class'=>'col-sm-2 col-form-label']) !!}
            <div class="col-sm-10">
                {!! Form::date('FECHA_INI', $proyectos->FECHA_INI, ['class'=>'form-control','required' =>'true']) !!}
            </div>
        </div>
        <div class="form-group row">
            {!! Form::label('FECHA_DEF','Fecha Defensa',['class'=>'col-sm-2 col-form-label']) !!}
            <div class="col-sm-10">
                {!! Form::date('FECHA_DEF', $proyectos->FECHA_DEF, ['class'=>'form-control','required' =>'true']) !!}
            </div>
        </div>
        <div class="form-group row">
            {!! Form::label('FECHA_PRORR','Fecha Prorroga',['class'=>'col-sm-2 col-form-label']) !!}
            <div class="col-sm-10">
                {!! Form::date('FECHA_PRORR', $proyectos->FECHA_PRORR, ['class'=>'form-control','required' =>'true']) !!}
            </div>
        </div>

    {!! Form::submit('cancelar', ['route'=>'profecional','class'=>'btn btn-danger']) !!}
    {!! Form::submit('actualizar', ['class'=>'btn btn-success']) !!}
    {!! Form::close() !!}
</div>
    
@endsection