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
            {!! Form::text('cod_sis', $estudiante->COD_SIS, ['class'=>'form-control','placeholder'=>"Ingrese el Codigo Sis"]) !!}
        </div>
    </div>
    <div class="form-group row">
        {!! Form::label('NOM_EST','Nombre',['class'=>'col-sm-2 col-form-label']) !!}
        <div class="col-sm-10">
            {!! Form::text('nombre',$estudiante->NOM_EST, ['class'=>'form-control','placeholder'=>"Ingrese el Nombre"]) !!}
        </div>
    </div>
    <div class="form-group row">
        {!! Form::label('AP_PAT_EST','Apellido Paterno',['class'=>'col-sm-2 col-form-label']) !!}
        <div class="col-sm-10">
            {!! Form::text('apellido_paterno',$estudiante->AP_PAT_EST, ['class'=>'form-control','placeholder'=>"Ingrese el Apellido Paterno"]) !!}
        </div>
    </div>
    <div class="form-group row">
        {!! Form::label('AP_MAT_EST','Apellido Materno',['class'=>'col-sm-2 col-form-label']) !!}
        <div class="col-sm-10">
            {!! Form::text('apellido_materno', $estudiante->AP_MAT_EST, ['class'=>'form-control','placeholder'=>"Ingrese el Apellido Materno"]) !!}
        </div>
    </div>
    <div class="form-group row">
        {!! Form::label('CI','CI',['class'=>'col-sm-2 col-form-label']) !!}
        <div class="col-sm-10">
            {!! Form::text('ci', $estudiante->CI, ['class'=>'form-control','placeholder'=>"Ingrese el CI"]) !!}
        </div>
    </div>
    <div class="form-group row">
        {!! Form::label('TELF','TELF',['class'=>'col-sm-2 col-form-label']) !!}
        <div class="col-sm-10">
            {!! Form::text('telefono', $estudiante->TELF, ['class'=>'form-control','placeholder'=>"Ingrese el Telefono"]) !!}
        </div>
    </div>
    <div class="form-group row">
        {!! Form::label('CORRETO_EST','Correo',['class'=>'col-sm-2 col-form-label']) !!}
        <div class="col-sm-10">
            {!! Form::email('correo', $estudiante->CORRETO_EST, ['class'=>'form-control','placeholder'=>"Ingrese un correo"]) !!}
        </div>
    </div>
    <a href="{{ route('estudiante.index') }}" class="btn btn-danger">Cancel</a>
    {!! Form::submit('actualizar', ['class'=>'btn btn-success']) !!}
    {!! Form::close() !!}
</div>

@endsection
