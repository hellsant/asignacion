@extends('layouts.principal')
@section('titulo1', 'REGISTRO')
@section('titulo2', 'DE AREAS')
@section('content')

<div>

    {!! Form::open(['route'=>'area.store','method'=>'POST']) !!}
    <div class="form-group row">
        {!! Form::label('COD_AREA','Codigo del area',['class'=>'col-sm-2 col-form-label']) !!}
        <div class="col-sm-10">
            {!! Form::text('COD_AREA', old('COD_AREA'), ['class'=>'form-control','required' =>'true','minlength'=>'1']) !!}
        </div>
    </div>
    <div class="form-group row">
        {!! Form::label('NOMBRE_AREA','Nombre del area',['class'=>'col-sm-2 col-form-label']) !!}
        <div class="col-sm-10">
            {!! Form::text('NOMBRE_AREA', old('NOMBRE_AREA'), ['class'=>'form-control','required' =>'true','minlength'=>'3']) !!}
        </div>
    </div>
    <div class="form-group row">
        {!! Form::label('DESC_AREA','Descripcion del area',['class'=>'col-sm-2 col-form-label']) !!}
        <div class="col-sm-10">
            {!! Form::text('DESC_AREA', old('DESC_AREA'), ['class'=>'form-control']) !!}
        </div>
    </div>
    {!! Form::submit('cancelar', ['route'=>'area','class'=>'btn btn-danger']) !!}
    {!! Form::submit('registrar', ['class'=>'btn btn-success']) !!}
    {!! Form::close() !!}
</div>
@endsection