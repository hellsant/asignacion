@extends('layouts.principal')
@section('titulo1', 'REGISTRO')
@section('titulo2', 'DE PERFILES')
@section('content')

<div>

    {!! Form::open(['route'=>'proyecto.store','method'=>'POST']) !!}
    <div class="form-group row">
        {!! Form::label('TITULO_PERFIL','Titulo Perfil',['class'=>'col-sm-2 col-form-label']) !!}
        <div class="col-sm-10">
            {!! Form::text('titulo', old('titulo'), ['class'=>'form-control','placeholder'=>"Ingrese el Titulo del Perfil"]) !!}
        </div>
    </div>


    <div class="form-group row">
        {!! Form::label('OBJ_GRAL','Objetivo General',['class'=>'col-sm-2 col-form-label']) !!}
        <div class="col-sm-10">
            {!! Form::text('objetivo_general', old('objetivo_general'), ['class'=>'form-control','placeholder'=>"Ingrese el Objetivo General"]) !!}
        </div>
    </div>

    <div class="form-group row">
        {!! Form::label('OBJ_ESP','Objetivos Especificos',['class'=>'col-sm-2 col-form-label']) !!}
        <div class="col-sm-10">
            {!! Form::text('objetivos_especificos', old('objetivos_especificos'), ['class'=>'form-control','placeholder'=>"Ingrese Objetivos Especificos"]) !!}
        </div>
    </div>

    <div class="form-group row">
        {!! Form::label('DESCRIPCION','Descripcion',['class'=>'col-sm-2 col-form-label']) !!}
        <div class="col-sm-10">
            {!! Form::text('descripcion', old('DESCRIPCION'), ['class'=>'form-control','placeholder'=>"Ingrese la Descripcion"]) !!}
        </div>
    </div>

    <div class="form-group row">
      {!! Form::label('FECHA_REGISTRO','Fecha de registro',['class'=>'col-sm-2 col-form-label']) !!}
      <div class="form-group col-sm-4">
        {!! Form::date('fecha_registro', $now, ['class'=>'form-control']) !!}
      </div>

      {!! Form::label('GESTION_REGISTRO','Gestión Registro',['class'=>'col-sm-2 col-form-label']) !!}
      <div class="form-group col-sm-4">
        {!! Form::select('gestion_registro', $gestiones,$gestiones, ['class'=>'form-control']) !!}
      </div>
    </div>

    <div class="form-group row">

      {!! Form::label('MODALIDAD','Modalidad',['class'=>'col-sm-2 col-form-label']) !!}
      <div class="form-group col-sm-4">
        {!! Form::select('modalidad',$modalidades, $modalidades ,['class'=>'form-control']) !!}
      </div>

      {!! Form::label('GESTION_LIMITE','Gestión Limite',['class'=>'col-sm-2 col-form-label']) !!}
      <div class="form-group col-sm-4">
        {!! Form::select( 'gestion_limite', $gestiones,  $gestiones, ['class'=>'form-control']) !!}
      </div>
    </div>

    <div class="form-group row">
      {!! Form::label('TUTOR','Tutor',['class'=>'col-sm-2 col-form-label']) !!}
      <div class="form-group col-sm-4">
        {!! Form::select('tutor',$tutores, $tutores ,['class'=>'form-control']) !!}
      </div>
      <div class="form-group row">
        <div class="text-center">
          <h3>
            <a href='{{ route('profesional.create')}}' data-toggle="tooltip" data-placement="right" title="Registar">
              <i class="fas fa-plus-square" aria-hidden="true" ></i>
            </a>
          </h3>
        </div>
      </div>

    </div>

    <div class="form-group row">
      {!! Form::label('ESTUDIANTE','Estudiante',['class'=>'col-sm-2 col-form-label']) !!}
      <div class="form-group col-sm-4">
        {!! Form::select('Estudiante',$estudiantes, $estudiantes ,['class'=>'form-control']) !!}
      </div>
      <div class="form-group row">
        <div class="text-center">
          <h3>
            <a href='{{ route('estudiante.create')}}' data-toggle="tooltip" data-placement="right" title="Registar">
              <i class="fas fa-plus-square" aria-hidden="true" ></i>
            </a>
          </h3>
        </div>
      </div>
    </div>

    <a href="{{ route('proyecto.index') }}" class="btn btn-danger">Cancel</a>
    {!! Form::submit('registrar', ['class'=>'btn btn-success']) !!}
    {!! Form::close() !!}
</div>
@endsection
