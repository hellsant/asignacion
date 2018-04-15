@extends('layouts.principal')
@section('titulo1', 'REGISTRO')
@section('titulo2', 'DE PROFECIONALES')
@section('content')

<div>

    {!! Form::open(['route'=>'profecional.store','method'=>'POST']) !!}
    
    <div class="form-group">
        {!! Form::label('COD_PROF','Codigo') !!}
        {!! Form::text('COD_PROF', old('COD_PROF'), ['class'=>'form-control','required' =>'true','minlength'=>'3']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('NOM_PROF','Nombre') !!}
        {!! Form::text('NOM_PROF', old('NOM_PROF'), ['class'=>'form-control','required' =>'true','minlength'=>'3']) !!}
    </div>
    <div>
        {!! Form::label('AP_PAT_PROF','Apellido Paterno') !!}
        {!! Form::text('AP_PAT_PROF', old('AP_PAT_PROF'), ['class'=>'form-control','required' =>'true','minlength'=>'3']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('AP_MAT_PROF','Apellido Materno') !!}
        {!! Form::text('AP_MAT_PROF', old('AP_MAT_PROF'), ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('TITULO_PROF','Titulo Profecional') !!}
        {!! Form::text('TITULO_PROF', old('TITULO_PROF'), ['class'=>'form-control','required' =>'true','minlength'=>'3']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('TELF_PROF','Telefono') !!}
        {!! Form::text('TELF_PROF', old('TELF_PROF'), ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('Direccion','Direccion') !!}
        {!! Form::text('DIREC_PROF', old('DIREC_PROF'), ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('CI_PROF','CI') !!}
        {!! Form::text('CI_PROF', old('CI_PROF'), ['class'=>'form-control','required' =>'true']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('COD_SIS_PROF','Codigo SIS') !!}
        {!! Form::text('COD_SIS_PROF', old('COD_SIS_PROF'), ['class'=>'form-control','required' =>'true']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('Tipo','Tipo') !!}
        {!! Form::select('Tipo',array('Interno' => 'Interno', 'Externo' => 'Exteno'), 'Interno',['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('CORREO_PROF','Correo') !!}
        {!! Form::email('CORREO_PROF', old('CORREO_PROF'), ['class'=>'form-control','required' =>'true']) !!}
    </div>
    {!! Form::submit('cancelar', ['route'=>'docente','class'=>'btn btn-danger']) !!}
    {!! Form::submit('registrar', ['class'=>'btn btn-success']) !!}
    {!! Form::close() !!}
</div>
@endsection