@extends('layouts.principal')
@section('titulo1', 'SELECCION')
@section('titulo2', 'DE MOTIVO DE RENUNCIA PARA EL TRIBUNAL')
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

<div class="form-group">
    {!! Form::open(['route'=>['tribunal.retirar', $profesional->id,$proyecto->id],'method'=>'patch']) !!}

    <div class="form-group row">
            {!! Form::label('id_profesional','ID Profesional',['class'=>'col-sm-2 col-form-label']) !!}
            <div class="col-sm-10">
                {!! Form::number('id_profesional', $profesional->id, ['class'=>'form-control','readonly']) !!}
            </div>
        </div>
        <div class="form-group row">
            {!! Form::label('profesional','Tribunal',['class'=>'col-sm-2 col-form-label']) !!}
            <div class="col-sm-10">

                {!! Form::text('profesional', "$profesional->NOM_PROF $profesional->AP_PAT_PROF $profesional->AP_MAT_PROF" , ['class'=>'form-control','readonly']) !!}
            </div>
        </div>
    <div class="form-group row">
        {!! Form::label('nombre_proyecto','Nombre del Proyecto',['class'=>'col-sm-2 col-form-label']) !!}
        <div class="col-sm-10">
            {!! Form::text('nombre_proyecto', $proyecto->TITULO_PERFIL, ['class'=>'form-control','readonly']) !!}
        </div>
    </div>
    <div class="form-group row">
        {!! Form::label('id_proyecto','Id del proyecto',['class'=>'col-sm-2 col-form-label']) !!}
        <div class="col-sm-10">
            {!! Form::number('id_proyecto', $proyecto->id, ['class'=>'form-control','readonly']) !!}
        </div>
    </div>
    <div class="form-group row">
        {!! Form::label('motivo','Motivo',['class'=>'col-sm-2 col-form-label']) !!}
        <div class="col-sm-10">
            {!! Form::select('motivo', $motivos, $motivos, ['class'=>'form-control']) !!}
        </div>
        {!! Form::label('descripcion','Descripción',['class'=>'col-sm-2 col-form-label']) !!}
        <div class="col-sm-10">
            {!! Form::text('descripcion',old('descripcion'), ['class'=>'form-control']) !!}
        </div>


    </div>

        <div class="form-group ">
            <a href="{{ route('tribunal.index') }}" class="btn btn-danger">Cancel</a>
            {!! Form::submit('Siguiente', ['type'=>"submit",'class'=>'btn btn-success', 'id'=>"btnreg"]) !!}
        </div>
        {!! Form::close() !!}
    </div>
    @endsection
