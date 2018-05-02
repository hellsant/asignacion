@extends('layouts.principal')
@section('titulo1', 'REGISTRO')
@section('titulo2', 'DE SUBAREAS')
@section('content')

<div>

    {!! Form::open(['route'=>'subarea.store','method'=>'POST','data-parsley-validate'=>""]) !!}
    <div class="form-group row">
        {!! Form::label('COD_SUBAREA','Codigo de la subarea',['class'=>'col-sm-2 col-form-label']) !!}
        <div class="col-sm-10">
            {!! Form::text('COD_SUBAREA', old('COD_SUBAREA'), ['class'=>'form-control',  'data-parsley-type'=>"number",'placeholder'=>"Ingrese el Codigo de la Subarea",'data-parsley-error-message'=>"Ingrese solo numeros",'required' =>'true','minlength'=>'1']) !!}
        </div>
    </div>
    <div class="form-group row">
        {!! Form::label('NOM_SUBAREA','Nombre de la subarea',['class'=>'col-sm-2 col-form-label']) !!}
        <div class="col-sm-10">
            {!! Form::text('NOM_SUBAREA', old('NOM_SUBAREA'), ['class'=>'form-control', 'data-parsley-pattern'=>"^[a-zA-Z ]+$",'placeholder'=>"Ingrese el Nombre de la Subarea", 'required' =>'true','data-parsley-error-message'=>"Ingrese solo letras y espacios",'minlength'=>'3']) !!}
        </div>
    </div>
    <div class="form-group row">
        {!! Form::label('DESC_SUBAREA','Descripcion de la subarea',['class'=>'col-sm-2 col-form-label']) !!}
        <div class="col-sm-10">
            {!! Form::text('DESC_SUBAREA', old('DESC_SUBAREA'), ['class'=>'form-control', 'data-parsley-pattern'=>"^[a-zA-Z ]+$",'placeholder'=>"Ingrese la Descripcion de la Subarea",'data-parsley-error-message'=>"Ingrese solo letras y espacios",'minlength'=>'3']) !!}
        </div>
    </div>
    <div class="form-group row">
        {!! Form::label('NOMBRE_AREA','Nombre del area al que pertenece',['class'=>'col-sm-2 col-form-label']) !!}
        <div class="col-sm-10">
            {!! Form::text('NOMBRE_AREA', $area, ['class'=>'form-control','readonly']) !!}
        </div>    
    </div>
    <div class="form-group row">
        {!! Form::hidden('area_id', $id) !!}
    </div>
    {!! Form::submit('cancelar', ['route'=>'subarea','class'=>'btn btn-danger']) !!}
    {!! Form::submit('registrar', ['class'=>'btn btn-success']) !!}
    {!! Form::close() !!}
</div>
@endsection