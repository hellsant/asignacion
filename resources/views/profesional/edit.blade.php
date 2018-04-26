@extends('layouts.principal')
@section('titulo1', 'ACTUALIZAR')
@section('titulo2', 'INFORMACION DEL PROFISIONAL')
@section('content')

<div>

    {!! Form::open(['route'=>['profesional.update', $profesional->id],'method'=>'patch']) !!}
    
    <div class="form-group row">
        {!! Form::label('NOM_PROF','Nombre',['class'=>'col-sm-2 col-form-label']) !!}
        <div class="col-sm-10">
            {!! Form::text('NOM_PROF',$profesional->NOM_PROF, ['class'=>'form-control','required' =>'true','minlength'=>'3']) !!}
        </div>
    </div>
    <div class="form-group row">
        {!! Form::label('AP_PAT_PROF','Apellido Paterno',['class'=>'col-sm-2 col-form-label']) !!}
        <div class="col-sm-10">
            {!! Form::text('AP_PAT_PROF',$profesional->AP_PAT_PROF, ['class'=>'form-control','required' =>'true','minlength'=>'3']) !!}
        </div>
    </div>
    <div class="form-group row">
        {!! Form::label('AP_MAT_PROF','Apellido Materno',['class'=>'col-sm-2 col-form-label']) !!}
        <div class="col-sm-10">
            {!! Form::text('AP_MAT_PROF', $profesional->AP_MAT_PROF, ['class'=>'form-control']) !!}
        </div>
    </div>
    <div class="form-group row">
        {!! Form::label('TITULO_PROF','Titulo Profesional',['class'=>'col-sm-2 col-form-label']) !!}
        <div class="col-sm-10">
            {!! Form::text('TITULO_PROF', $profesional->TITULO_PROF, ['class'=>'form-control','required' =>'true','minlength'=>'3']) !!}
        </div>
    </div>
    <div class="form-group row">
        {!! Form::label('TELF_PROF','Telefono',['class'=>'col-sm-2 col-form-label']) !!}
        <div class="col-sm-10">
            {!! Form::text('TELF_PROF',$profesional->TELF_PROF, ['class'=>'form-control']) !!}
        </div>
    </div>
    <div class="form-group row">
        {!! Form::label('CI_PROF','CI',['class'=>'col-sm-2 col-form-label']) !!}
        <div class="col-sm-10">
            {!! Form::text('CI_PROF', $profesional->CI_PROF, ['class'=>'form-control','required' =>'true']) !!}
        </div>
    </div>
    <div class="form-group row">
        {!! Form::label('MON_CUENTA','Cuenta',['class'=>'col-sm-2 col-form-label']) !!}
        <div class="col-sm-10">
            {!! Form::text('MON_CUENTA', $profesional->MON_CUENTA, ['class'=>'form-control','required' =>'true']) !!}
        </div>
    </div>
    <div class="form-group row">
        {!! Form::label('Tipo','Tipo',['class'=>'col-sm-2 col-form-label']) !!}
        <div class="col-sm-10">
            {!! Form::select('Tipo',array('Interno' => 'Interno', 'Externo' => 'Exteno'), $profesional->Tipo,['class'=>'form-control']) !!}
        </div>
    </div>
    <div class="form-group row">
        {!! Form::label('CORREO_PROF','Correo',['class'=>'col-sm-2 col-form-label']) !!}
        <div class="col-sm-10">
            {!! Form::email('CORREO_PROF', $profesional->CORREO_PROF, ['class'=>'form-control','required' =>'true']) !!}
        </div>
    </div>
    {!! Form::submit('cancelar', ['route'=>'profesional','class'=>'btn btn-danger']) !!}
    {!! Form::submit('actualizar', ['class'=>'btn btn-success']) !!}
    {!! Form::close() !!}
</div>
    
@endsection