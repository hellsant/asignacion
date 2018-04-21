@extends('layouts.principal')
@section('titulo1', 'ACTUALIZAR')
@section('titulo2', 'INFORMACION AREAS')
@section('content')

<div>

    {!! Form::open(['route'=>['area.update', $area->id],'method'=>'POST test-form','data-parsley-validate'=>""]) !!}
    
    <div class="form-group row">
        {!! Form::label('COD_AREA','Codigo Area',['class'=>'col-sm-2 col-form-label']) !!}
        <div class="col-sm-10">
            {!! Form::number('COD_AREA', $area->COD_AREA, ['class'=>'form-control',  'data-parsley-type'=>"number",'placeholder'=>"Ingrese el Codigo del Area", 'required' =>'true','data-parsley-error-message'=>"Ingrese solo numeros",'required' =>'true']) !!}
        </div>
    </div>
    <div class="form-group row">
        {!! Form::label('NOMBRE_AREA','Nombre',['class'=>'col-sm-2 col-form-label']) !!}
        <div class="col-sm-10">
            {!! Form::text('NOMBRE_AREA',$area->NOMBRE_AREA, ['class'=>'form-control', 'data-parsley-pattern'=>"^[a-zA-Z ]+$",'placeholder'=>"Ingrese el Nombre del Area", 'required' =>'true','data-parsley-error-message'=>"Ingrese solo letras y espacios",'minlength'=>'3']) !!}
        </div>
    </div>
    <div class="form-group row">
            {!! Form::label('DESC_AREA','Descripcion',['class'=>'col-sm-2 col-form-label']) !!}
            <div class="col-sm-10">
                {!! Form::text('DESC_AREA', $area->DESC_AREA, ['class'=>'form-control',placeholder'=>"Ingrese una descripcion",'required' =>'true','minlength'=>'3']) !!}
            </div>
        </div>
    {!! Form::submit('cancelar', ['route'=>'area','class'=>'btn btn-danger']) !!}
    {!! Form::submit('actualizar', ['class'=>'btn btn-success']) !!}
    {!! Form::close() !!}
</div>
    
@endsection