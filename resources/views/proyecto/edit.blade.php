@extends('layouts.principal')
@section('titulo1', 'ACTUALIZAR')
@section('titulo2', 'INFORMACION DEL PERFIL')
@section('content')

<div>

    {!! Form::open(['route'=>['proyecto.update', $proyecto->id],'method'=>'patch']) !!}
   
    <div class="form-group row">
            {!! Form::label('TITULO_PERFIL','Titulo Perfil',['class'=>'col-sm-2 col-form-label']) !!}
            <div class="col-sm-10">
            {!! Form::text('TITULO_PERFIL', $proyecto->TITULO_PERFIL, ['class'=>'form-control', 'data-parsley-pattern'=>"^[a-zA-Z ]+$",'placeholder'=>"Ingrese el Titulo del Proyecto",'data-parsley-error-message'=>"Ingrese solo letras y espacios",'required' =>'true','minlength'=>'3']) !!}
            </div>
        </div>
        <div class="form-group row">
            {!! Form::label('FECHA_REGISTRO','Fecha de registro',['class'=>'col-sm-2 col-form-label']) !!}
            <div class="col-sm-10">
            {!! Form::date('FECHA_REGISTRO', $proyecto->FECHA_REGISTRO, ['class'=>'form-control','required' =>'true','minlength'=>'3']) !!}
            </div>
        </div>
        <div class="form-group row">
            {!! Form::label('OBJ_GRAL','Objetivo General',['class'=>'col-sm-2 col-form-label']) !!}
            <div class="col-sm-10">
            {!! Form::text('OBJ_GRAL', $proyecto->OBJ_GRAL, ['class'=>'form-control', 'data-parsley-pattern'=>"^[a-zA-Z ]+$",'placeholder'=>"Ingrese el Objetivo General",'data-parsley-error-message'=>"Ingrese solo letras y espacios",'required' =>'true','minlength'=>'3']) !!}
            </div>
        </div>
        <div class="form-group row">
            {!! Form::label('OBJ_ESP','Objetivos Espesificos',['class'=>'col-sm-2 col-form-label']) !!}
            <div class="col-sm-10">
            {!! Form::text('OBJ_ESP', $proyecto->OBJ_ESP, ['class'=>'form-control', 'data-parsley-pattern'=>"^[a-zA-Z ]+$",'placeholder'=>"Ingrese Objetivos Especificos",'data-parsley-error-message'=>"Ingrese solo letras y espacios"]) !!}
            </div>
        </div>
        <div class="form-group row">
            {!! Form::label('DESCRIPCION','Descripcion',['class'=>'col-sm-2 col-form-label']) !!}
            <div class="col-sm-10">
            {!! Form::text('DESCRIPCION', $proyecto->DESCRIPCION, ['class'=>'form-control', 'data-parsley-pattern'=>"^[a-zA-Z ]+$",'placeholder'=>"Ingrese la Descripcion del Proyecto",'data-parsley-error-message'=>"Ingrese solo letras y espacios"]) !!}
            </div>
        </div>
        {!! Form::hidden('modalidad_id', $proyecto->modalidad_id) !!}

    <a href="{{ route('proyecto.index') }}" class="btn btn-danger">Cancel</a>
    {!! Form::submit('actualizar', ['class'=>'btn btn-success']) !!}
    {!! Form::close() !!}
</div>
    
@endsection