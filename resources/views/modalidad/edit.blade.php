@extends('layouts.principal')
@section('titulo1', 'ACTUALIZAR')
@section('titulo2', 'INFORMACION DE LA MODALIDAD')
@section('content')

<div>

    {!! Form::open(['route'=>['modalidad.update', $modalidad->id],'method'=>'patch','data-parsley-validate'=>""]) !!}
    
    <div class="form-group row">
        {!! Form::label('NOM','Modalidad',['class'=>'col-sm-2 col-form-label']) !!}
        <div class="col-sm-10">
            {!! Form::text('NOM',$modalidad->NOM, ['class'=>'form-control', 'data-parsley-pattern'=>"^[a-zA-Z ]+$",'placeholder'=>"Ingrese el Nombre de la Modalidad",'data-parsley-error-message'=>"Ingrese solo letras y espacios",'required' =>'true','minlength'=>'3']) !!}
        </div>
    </div>
    <div class="form-group row">
        {!! Form::label('DESC','Descripcion',['class'=>'col-sm-2 col-form-label']) !!}
        <div class="col-sm-10">
            {!! Form::text('DESC',$modalidad->DESC, ['class'=>'form-control', 'data-parsley-pattern'=>"^[a-zA-Z ]+$",'placeholder'=>"Ingrese descripcion de la Modalidad",'data-parsley-error-message'=>"Ingrese solo letras y espacios"]) !!}
        </div>
    </div>
    <a href="{{ route('modalidad.index') }}" class="btn btn-danger">Cancel</a>
    {!! Form::submit('actualizar', ['class'=>'btn btn-success']) !!}
    {!! Form::close() !!}
</div>
    
@endsection