@extends('layouts.principal')
@section('titulo1', 'ACTUALIZAR')
@section('titulo2', 'INFORMACION DEL profecional')
@section('content')

<div>

    {!! Form::open(['route'=>['profecional.update', $profecional->id],'method'=>'patch']) !!}
    
    </div>
    <div class="form-group row">
        {!! Form::label('NOM_PROF','Nombre',['class'=>'col-sm-2 col-form-label']) !!}
        <div class="col-sm-10">
        {!! Form::text('NOM_PROF',$profecional->NOM_PROF, ['class'=>'form-control','required' =>'true','minlength'=>'3']) !!}
    </div>
    </div>
    <div class="form-group row">
        {!! Form::label('AP_PAT_PROF','Apellido Paterno',['class'=>'col-sm-2 col-form-label']) !!}
        <div class="col-sm-10">
        {!! Form::text('AP_PAT_PROF',$profecional->AP_PAT_PROF, ['class'=>'form-control','required' =>'true','minlength'=>'3']) !!}
    </div>
    </div>
    <div class="form-group row">
        {!! Form::label('AP_MAT_PROF','Apellido Materno',['class'=>'col-sm-2 col-form-label']) !!}
        <div class="col-sm-10">
        {!! Form::text('AP_MAT_PROF', $profecional->AP_MAT_PROF, ['class'=>'form-control']) !!}
    </div>
    </div>
    <div class="form-group row">
        {!! Form::label('TITULO_PROF','Titulo Profecional',['class'=>'col-sm-2 col-form-label']) !!}
        <div class="col-sm-10">
        {!! Form::text('TITULO_PROF', $profecional->TITULO_PROF, ['class'=>'form-control','required' =>'true','minlength'=>'3']) !!}
    </div>
    </div>
    <div class="form-group row">
        {!! Form::label('TELF_PROF','Telefono',['class'=>'col-sm-2 col-form-label']) !!}
        <div class="col-sm-10">
        {!! Form::text('TELF_PROF',$profecional->TELF_PROF, ['class'=>'form-control']) !!}
    </div>
    </div>
    <div class="form-group row">
        {!! Form::label('Direccion','Direccion',['class'=>'col-sm-2 col-form-label']) !!}
        <div class="col-sm-10">
        {!! Form::text('DIREC_PROF', $profecional->DIREC_PROF, ['class'=>'form-control']) !!}
    </div>
    </div>
    <div class="form-group row">
        {!! Form::label('CI_PROF','CI',['class'=>'col-sm-2 col-form-label']) !!}
        <div class="col-sm-10">
        {!! Form::text('CI_PROF', $profecional->CI_PROF, ['class'=>'form-control','required' =>'true']) !!}
    </div>
    </div>
    <div class="form-group row">
        {!! Form::label('COD_SIS_PROF','Codigo SIS',['class'=>'col-sm-2 col-form-label']) !!}
        <div class="col-sm-10">
        {!! Form::text('COD_SIS_PROF', $profecional->COD_SIS_PROF, ['class'=>'form-control','required' =>'true']) !!}
    </div>
    </div>
    <div class="form-group row">
        {!! Form::label('Tipo','Tipo',['class'=>'col-sm-2 col-form-label']) !!}
        <div class="col-sm-10">
        {!! Form::select('Tipo',array('Interno' => 'Interno', 'Externo' => 'Exteno'), $profecional->Tipo,['class'=>'form-control']) !!}
    </div>
    </div>
    <div class="form-group row">
        {!! Form::label('CORREO_PROF','Correo',['class'=>'col-sm-2 col-form-label']) !!}
        <div class="col-sm-10">
        {!! Form::email('CORREO_PROF', $profecional->CORREO_PROF, ['class'=>'form-control','required' =>'true']) !!}
    </div>
    </div>
    {!! Form::submit('cancelar', ['route'=>'profecional','class'=>'btn btn-danger']) !!}
    {!! Form::submit('actualizar', ['class'=>'btn btn-success']) !!}
    
    {!! Form::close() !!}
</div>
    
@endsection