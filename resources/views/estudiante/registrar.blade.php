@extends('layouts.principal')
@section('titulo1', 'REGISTRO')
@section('titulo2', 'DE ESTUDIANTES')
@section('content')

<div>
    {!! Form::open(['route'=>'estudiante.store','method'=>'POST test-form','data-parsley-validate'=>""]) !!}

    <!-- Para mostrar error en las validaciones-->
        @foreach ($errors->all() as $error)
        <p class="alert alert-danger"> {{ $error }}</p>
        @endforeach

    <div class="form-group row">
        {!! Form::label('COD_SIS','Codigo SIS',['class'=>'col-sm-2 col-form-label']) !!}
        <div class="col-sm-10">
            {!! Form::text('cod_sis', old('COD_SIS'), ['class'=>'form-control','placeholder'=>"Ingrese el Codigo Sis"]) !!}
        </div>
    </div>
    <div class="form-group row">
        {!! Form::label('NOM_EST','Nombre',['class'=>'col-sm-2 col-form-label']) !!}
        <div class="col-sm-10">
            {!! Form::text('nombre', old('NOM_EST'), ['class'=>'form-control','placeholder'=>"Ingrese el Nombre"]) !!}
        </div>
    </div>
    <div class="form-group row">
        {!! Form::label('AP_PAT_EST','Apellido Paterno',['class'=>'col-sm-2 col-form-label','control-label']) !!}
        <div class="col-sm-10">
            {!! Form::text('apellido_paterno', old('AP_PAT_EST'), ['class'=>'form-control','placeholder'=>"Ingrese el Apellido Paterno"]) !!}
        </div>
    </div>
    <div class="form-group row">
        {!! Form::label('AP_MAT_EST','Apellido Materno',['class'=>"col-sm-2 col-form-label control-label"]) !!}
        <div class="col-sm-10">
            {!! Form::text('apellido_materno', old('AP_MAT_EST'), ['class'=>'form-control','placeholder'=>"Ingrese el Apellido Materno"]) !!}
        </div>
    </div>
    <div class="form-group row">
        {!! Form::label('CI','CI',['class'=>'col-sm-2 col-form-label control-label','data-smk-icon'=>"glyphicon-remove"]) !!}
        <div class="col-sm-10">
            {!! Form::text('ci', old('CI'), ['class'=>'form-control','placeholder'=>"Ingrese el CI"]) !!}
        </div>
    </div>
    <div class="form-group row">
        {!! Form::label('TELF','TELF',['class'=>'col-sm-2 col-form-label control-label','data-smk-icon'=>"glyphicon-remove"]) !!}
        <div class="col-sm-10">
            {!! Form::number('telefono', old('TELF'), ['class'=>'form-control','placeholder'=>"Ingrese el Telefono"]) !!}
        </div>
    </div>
    <div class="form-group row">
        {!! Form::label('CORRETO_EST','Correo',['class'=>'col-sm-2 col-form-label']) !!}
        <div class="col-sm-10">
            {!! Form::email('correo', old('CORRETO_EST'), ['class'=>'form-control',  'data-parsley-type'=>"email",'placeholder'=>"Ingrese un correo"]) !!}
        </div>
    </div>
    <div class="form-group pull-right">
        <a href="{{ route('estudiante.index') }}" class="btn btn-danger">Cancel</a>
        {!! Form::submit('registrar', ['type'=>"submit",'class'=>'btn btn-success', 'id'=>"btnreg"]) !!}

    </div>
    {!! Form::close() !!}

</div>
@endsection
