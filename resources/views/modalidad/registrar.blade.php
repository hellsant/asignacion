@extends('layouts.principal')
@section('titulo1', 'REGISTRO')
@section('titulo2', 'DE MODALIDADES')
@section('content')

<div>

    {!! Form::open(['route'=>'modalidad.store','method'=>'POST']) !!}
    <div class="form-group row">
        {!! Form::label('NOM','Modalidad',['class'=>'col-sm-2 col-form-label']) !!}
        <div class="col-sm-10">
            {!! Form::text('NOM', old('NOM'), ['class'=>'form-control','required' =>'true','minlength'=>'3']) !!}
        </div>
    </div>
    <div class="form-group row">
        {!! Form::label('DESC','Descripcion',['class'=>'col-sm-2 col-form-label']) !!}
        <div class="col-sm-10">
            {!! Form::text('DESC', old('DESC'), ['class'=>'form-control']) !!}
        </div>
    </div>
    {!! Form::submit('cancelar', ['route'=>'modalidad','class'=>'btn btn-danger']) !!}
    {!! Form::submit('registrar', ['class'=>'btn btn-success']) !!}
    {!! Form::close() !!}
</div>
@endsection