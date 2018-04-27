@extends('layouts.principal')
@section('titulo1', 'ACTUALIZAR')
@section('titulo2', 'INFORMACION DEL ESTUDIANTE')
@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div><br />
@endif
<div>


    {!! Form::open(['route'=>['estudiante.update', $estudiante->id],'method'=>'put test-form','data-parsley-validate'=>""]) !!}
    {{method_field('PUT')}}
    
    <div class="form-group row">
        {!! Form::label('COD_SIS','Codigo SIS',['class'=>'col-sm-2 col-form-label']) !!}
        <div class="col-sm-10">
            {!! Form::number('COD_SIS', $estudiante->COD_SIS, ['class'=>'form-control',  'data-parsley-type'=>"number",'placeholder'=>"Ingrese el Codigo Sis", 'required' =>'true','data-parsley-error-message'=>"Ingrese solo numeros",'required' =>'true']) !!}
        </div>
    </div>
    <div class="form-group row">
        {!! Form::label('NOM_EST','Nombre',['class'=>'col-sm-2 col-form-label']) !!}
        <div class="col-sm-10">
            {!! Form::text('NOM_EST',$estudiante->NOM_EST, ['class'=>'form-control', 'data-parsley-pattern'=>"^[a-zA-Z ]+$",'placeholder'=>"Ingrese el Nombre", 'required' =>'true','data-parsley-error-message'=>"Ingrese solo letras y espacios",'minlength'=>'3']) !!}
        </div>
    </div>
    <div class="form-group row">
        {!! Form::label('AP_PAT_EST','Apellido Paterno',['class'=>'col-sm-2 col-form-label']) !!}
        <div class="col-sm-10">
            {!! Form::text('AP_PAT_EST',$estudiante->AP_PAT_EST, ['class'=>'form-control', 'data-parsley-pattern'=>"^[a-zA-Z ]+$",'placeholder'=>"Ingrese el Apellido Paterno", 'required' =>'true','data-parsley-error-message'=>"Ingrese solo letras y espacios",'minlength'=>'3']) !!}
        </div>
    </div>
    <div class="form-group row">
        {!! Form::label('AP_MAT_EST','Apellido Materno',['class'=>'col-sm-2 col-form-label']) !!}
        <div class="col-sm-10">
            {!! Form::text('AP_MAT_EST', $estudiante->AP_MAT_EST, ['class'=>'form-control', 'data-parsley-pattern'=>"^[a-zA-Z ]+$",'placeholder'=>"Ingrese el Apellido Materno", 'required' =>'true','data-parsley-error-message'=>"Ingrese solo letras y espacios",'minlength'=>'3']) !!}
        </div>
    </div>
    <div class="form-group row">
        {!! Form::label('CI','CI',['class'=>'col-sm-2 col-form-label']) !!}
        <div class="col-sm-10">
            {!! Form::number('CI', $estudiante->CI, ['class'=>'form-control',  'data-parsley-type'=>"number",'placeholder'=>"Ingrese el CI", 'required' =>'true','data-parsley-error-message'=>"Ingrese solo numeros",'required' =>'true']) !!}
        </div>
    </div>
    <div class="form-group row">
        {!! Form::label('TELF','TELF',['class'=>'col-sm-2 col-form-label']) !!}
        <div class="col-sm-10">
            {!! Form::number('TELF', $estudiante->TELF, ['class'=>'form-control',  'data-parsley-type'=>"number",'placeholder'=>"Ingrese el Telefono", 'required' =>'true','data-parsley-error-message'=>"Ingrese solo numeros",'required' =>'true']) !!}
        </div>
    </div>
    <div class="form-group row">
        {!! Form::label('CORRETO_EST','Correo',['class'=>'col-sm-2 col-form-label']) !!}
        <div class="col-sm-10">
            {!! Form::email('CORRETO_EST', $estudiante->CORRETO_EST, ['class'=>'form-control',  'data-parsley-type'=>"email",'placeholder'=>"Ingrese un correo", 'data-parsley-error-message'=>"null",'required' =>'true']) !!}
        </div>
    </div>
    {!! Form::submit('atras', ['route'=>'estudiante','class'=>'btn btn-info']) !!}
    {!! Form::submit('actualizar', ['class'=>'btn btn-success']) !!}
    {!! Form::close() !!}
</div>
    
@endsection