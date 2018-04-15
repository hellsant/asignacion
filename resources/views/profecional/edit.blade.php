@extends('layouts.principal')
@section('titulo1', 'ACTUALIZAR')
@section('titulo2', 'INFORMACION DEL profecional')
@section('content')

<div>

    {!! Form::open(['route'=>['profecional.update', $profecional->id],'method'=>'patch']) !!}
    
    <div class="form-group">
        {!! Form::label('COD_PROF','Codigo') !!}
        {!! Form::text('COD_PROF', $profecional->COD_PROF, ['class'=>'form-control','required' =>'true','minlength'=>'3']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('NOM_PROF','Nombre') !!}
        {!! Form::text('NOM_PROF',$profecional->NOM_PROF, ['class'=>'form-control','required' =>'true','minlength'=>'3']) !!}
    </div>
    <div>
        {!! Form::label('AP_PAT_PROF','Apellido Paterno') !!}
        {!! Form::text('AP_PAT_PROF',$profecional->AP_PAT_PROF, ['class'=>'form-control','required' =>'true','minlength'=>'3']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('AP_MAT_PROF','Apellido Materno') !!}
        {!! Form::text('AP_MAT_PROF', $profecional->AP_MAT_PROF, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('TITULO_PROF','Titulo Profecional') !!}
        {!! Form::text('TITULO_PROF', $profecional->TITULO_PROF, ['class'=>'form-control','required' =>'true','minlength'=>'3']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('TELF_PROF','Telefono') !!}
        {!! Form::text('TELF_PROF',$profecional->TELF_PROF, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('Direccion','Direccion') !!}
        {!! Form::text('DIREC_PROF', $profecional->DIREC_PROF, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('CI_PROF','CI') !!}
        {!! Form::text('CI_PROF', $profecional->CI_PROF, ['class'=>'form-control','required' =>'true']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('COD_SIS_PROF','Codigo SIS') !!}
        {!! Form::text('COD_SIS_PROF', $profecional->COD_SIS_PROF, ['class'=>'form-control','required' =>'true']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('Tipo','Tipo') !!}
        {!! Form::select('Tipo',array('Interno' => 'Interno', 'Externo' => 'Exteno'), $profecional->Tipo,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('CORREO_PROF','Correo') !!}
        {!! Form::email('CORREO_PROF', $profecional->CORREO_PROF, ['class'=>'form-control','required' =>'true']) !!}
    </div>
    {!! Form::submit('cancelar', ['route'=>'profecional','class'=>'btn btn-danger']) !!}
    {!! Form::submit('actualizar', ['class'=>'btn btn-success']) !!}
    
    {!! Form::close() !!}
</div>
    
@endsection