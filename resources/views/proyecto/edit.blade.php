@extends('layouts.principal')
@section('titulo1', 'ACTUALIZAR')
@section('titulo2', 'INFORMACION DEL PERFIL')
@section('content')

<div>

    {!! Form::open(['route'=>['proyecto.update', $proyecto->id],'method'=>'patch']) !!}

    <div class="form-group row">
        {!! Form::label('TITULO_PERFIL','Titulo Perfil',['class'=>'col-sm-2 col-form-label']) !!}
        <div class="col-sm-10">
            {!! Form::text('titulo', $proyecto->TITULO_PERFIL, ['class'=>'form-control','placeholder'=>"Ingrese el Titulo del Perfil"]) !!}
        </div>
    </div>


    <div class="form-group row">
        {!! Form::label('OBJ_GRAL','Objetivo General',['class'=>'col-sm-2 col-form-label']) !!}
        <div class="col-sm-10">
            {!! Form::textarea('objetivo_general', $proyecto->OBJ_GRAL, ['class'=>'form-control','placeholder'=>"Ingrese el Objetivo General"]) !!}
        </div>
    </div>

    <div class="form-group row">
        {!! Form::label('OBJ_ESP','Objetivos Especificos',['class'=>'col-sm-2 col-form-label']) !!}
        <div class="col-sm-10">
            {!! Form::textarea('objetivos_especificos',$proyecto->OBJ_ESP, ['class'=>'form-control','placeholder'=>"Ingrese Objetivos Especificos"]) !!}
        </div>
    </div>

    <div class="form-group row">
        {!! Form::label('DESCRIPCION','Descripcion',['class'=>'col-sm-2 col-form-label']) !!}
        <div class="col-sm-10">
            {!! Form::textarea('descripcion', $proyecto->DESC, ['class'=>'form-control','placeholder'=>"Ingrese la Descripcion"]) !!}
        </div>
    </div>

    <div class="form-group row">
      {!! Form::label('FECHA_REGISTRO','Fecha de registro',['class'=>'col-sm-2 col-form-label']) !!}
      <div class="form-group col-sm-4">
        {!! Form::date('fecha_registro', $now, ['class'=>'form-control']) !!}
      </div>

      {!! Form::label('GESTION_REGISTRO','Gestión Registro',['class'=>'col-sm-2 col-form-label']) !!}
      <div class="form-group col-sm-4">
        {!! Form::select('gestion_registro', $gestiones,$proyecto->GESTION_REGISTRO, ['class'=>'form-control']) !!}
      </div>
    </div>

    <div class="form-group row">

      {!! Form::label('MODALIDAD','Modalidad',['class'=>'col-sm-2 col-form-label']) !!}
      <div class="form-group col-sm-4">
        {!! Form::select('modalidad',$modalidades, $proyecto->modalidad_id ,['class'=>'form-control']) !!}
      </div>

      {!! Form::label('GESTION_LIMITE','Gestión Limite',['class'=>'col-sm-2 col-form-label']) !!}
      <div class="form-group col-sm-4">
        {!! Form::select( 'gestion_limite', $gestiones,  $proyecto->gestion_limite, ['class'=>'form-control']) !!}
      </div>
    </div>


        {!! Form::hidden('modalidad_id', $proyecto->modalidad_id) !!}

    <a href="{{ route('proyecto.index') }}" class="btn btn-danger">Cancel</a>
    {!! Form::submit('actualizar', ['class'=>'btn btn-success']) !!}
    {!! Form::close() !!}
</div>

@endsection
