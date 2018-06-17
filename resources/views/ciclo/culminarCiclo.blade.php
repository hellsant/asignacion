@extends('layouts.principal')
@section('titulo1', 'CULMINAR')
@section('titulo2', 'CICLO DEL PROYECTO')
@section('content')


<div class="form-group">
    {!! Form::open(['route'=>['proyecto.terminarCiclo',$proyectos->id],'method'=>'patch']) !!}
    <div class="form-group row">
        {!! Form::label('proyecto_id','ID Proyecto',['class'=>'col-sm-2 col-form-label']) !!}
        <div class="col-sm-10">
            {!! Form::number('proyecto_id', $proyectos->id, ['class'=>'form-control','readonly']) !!}
        </div>
    </div>
    <div class="form-group row">
        {!! Form::label('nombre_proyecto','Nombre del Proyecto',['class'=>'col-sm-2 col-form-label']) !!}
        <div class="col-sm-10">
            {!! Form::text('nombre_proyecto', $proyectos->TITULO_PERFIL, ['class'=>'form-control','readonly']) !!}
        </div>
    </div>
    <div class="form-group row">
        @foreach ( $estudiante as $e)
        {!! Form::label('codsis','Codigo Sis',['class'=>'col-sm-2 col-form-label']) !!}
        <div class="col-sm-10">
            {!! Form::text('codsis',$e->COD_SIS, ['class'=>'form-control','readonly']) !!}
        </div>
        {!! Form::label('estudiante','Estudiante',['class'=>'col-sm-2 col-form-label']) !!}
        <div class="col-sm-10">
            {!! Form::text('estudiante', "$e->NOM_EST $e->AP_PAT_EST $e->AP_MAT_EST", ['class'=>'form-control','readonly']) !!}
        </div>
        @endforeach
        {!! Form::label('CICLO','Motivo',['class'=>'col-sm-2 col-form-label']) !!}
        <div class="col-sm-10">
            {!! Form::select('CICLO', array('en progreso' => 'en progreso', 'defendido' => 'defendido', 'expirado'=>'expirado'), $proyectos->CICLO, ['class'=>'form-control']) !!}
        </div>
    </div>
    <div class="form-group ">
        <a href="{{ route('proyecto.index') }}" class="btn btn-danger">Cancel</a>
        {!! Form::submit('guardar', ['type'=>"submit",'class'=>'btn btn-success', 'id'=>"btnreg"]) !!}
    </div>
    {!! Form::close() !!}
</div>
@endsection
    
    