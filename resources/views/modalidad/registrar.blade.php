@extends('layouts.principal')
@section('titulo1', 'REGISTRO')
@section('titulo2', 'DE MODALIDADES')
@section('content')

<div>

    {!! Form::open(['route'=>'modalidad.store','method'=>'POST','data-parsley-validate'=>""]) !!}
    <div class="form-group row">
        {!! Form::label('NOM','Modalidad',['class'=>'col-sm-2 col-form-label']) !!}
        <div class="col-sm-10">
            {!! Form::text('NOM', old('NOM'), ['class'=>'form-control', 'data-parsley-pattern'=>"^[a-zA-Z ]+$",'placeholder'=>"Ingrese el Nombre de la Modalidad",'data-parsley-error-message'=>"Ingrese solo letras y espacios",'required' =>'true','minlength'=>'3']) !!}
        </div>
    </div>
    <div class="form-group row">
        {!! Form::label('DESC','Descripcion',['class'=>'col-sm-2 col-form-label']) !!}
        <div class="col-sm-10">
            {!! Form::textarea('DESC', old('DESC'), ['class'=>'form-control', 'data-parsley-pattern'=>"^[a-zA-Z ]+$",'placeholder'=>"Ingrese descripcion de la Modalidad",'data-parsley-error-message'=>"Ingrese solo letras y espacios"]) !!}
        </div>
    </div>
    <a href="{{ route('modalidad.index') }}" class="btn btn-danger">Cancel</a>
    {!! Form::submit('registrar', ['class'=>'btn btn-success']) !!}
    {!! Form::close() !!}
</div>
@endsection