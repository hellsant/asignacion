@extends('layouts.principal')
@section('titulo1', 'ACTUALIZAR')
@section('titulo2', 'INFORMACION DE LA CARRERA')
@section('content')

<div>

    {!! Form::open(['route'=>['carrera.update', $carrera->id],'method'=>'POST test-form','data-parsley-validate'=>""]) !!}
    {{method_field('PUT')}}
    <div class="form-group row">
        {!! Form::label('COD_CARRERA','Codigo SIS',['class'=>'col-sm-2 col-form-label']) !!}
        <div class="col-sm-10">
            {!! Form::number('COD_CARRERA', $carrera->COD_CARRERA, ['class'=>'form-control',  'data-parsley-type'=>"number",'placeholder'=>"Ingrese el Codigo de la Carrera", 'required' =>'true','data-parsley-error-message'=>"Ingrese solo numeros",'required' =>'true']) !!}
        </div>
    </div>
    <div class="form-group row">
        {!! Form::label('NOM_CARRERA','Nombre',['class'=>'col-sm-2 col-form-label']) !!}
        <div class="col-sm-10">
            {!! Form::text('NOM_CARRERA',$carrera->NOM_CARRERA,  ['class'=>'form-control', 'data-parsley-pattern'=>"^[a-zA-Z ]+$",'placeholder'=>"Ingrese el Nombre de la Carrera", 'required' =>'true','data-parsley-error-message'=>"Ingrese solo letras y espacios",'minlength'=>'3']) !!}
        </div>
    </div>
    <a href="{{ route('carrera.index') }}" class="btn btn-danger">Cancel</a>
    {!! Form::submit('actualizar', ['class'=>'btn btn-success']) !!}
    {!! Form::close() !!}
</div>
    
@endsection