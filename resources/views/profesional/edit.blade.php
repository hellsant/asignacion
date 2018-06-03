@extends('layouts.principal')
@section('titulo1', 'ACTUALIZAR')
@section('titulo2', 'INFORMACION DEL PROFESIONAL')
@section('content')

<div>

    {!! Form::open(['route'=>['profesional.update', $profesional->id],'method'=>'patch','data-parsley-validate'=>""]) !!}

<!-- Para mostrar error en las validaciones-->
    @foreach ($errors->all() as $error)
    <p class="alert alert-danger"> {{ $error }}</p>
    @endforeach

    <div class="form-group row">
        {!! Form::label('NOM_P','Nombre',['class'=>'col-sm-2 col-form-label']) !!}
        <div class="col-sm-10">
<!--            {!! Form::text('NOM_PROF',$profesional->NOM_PROF, ['class'=>'form-control', 'data-parsley-pattern'=>"^[a-zA-Z ]+$",'placeholder'=>"Ingrese el Nombre del Profesional",'data-parsley-error-message'=>"Ingrese solo letras y espacios",'required' =>'true','minlength'=>'3']) !!} -->
            {!! Form::text('nombre',$profesional->NOM_PROF, ['class'=>'form-control', 'placeholder'=>"Ingrese el Nombre del Profesional"]) !!}
        </div>
    </div>
    <div class="form-group row">
        {!! Form::label('AP_P','Apellido Paterno',['class'=>'col-sm-2 col-form-label']) !!}
        <div class="col-sm-10">
            {!! Form::text('apellido_paterno',$profesional->AP_PAT_PROF, ['class'=>'form-control','placeholder'=>"Ingrese el Apellido Paterno"]) !!}
        </div>
    </div>
    <div class="form-group row">
        {!! Form::label('AP_M','Apellido Materno',['class'=>'col-sm-2 col-form-label']) !!}
        <div class="col-sm-10">
            {!! Form::text('apellido_materno', $profesional->AP_MAT_PROF, ['class'=>'form-control','placeholder'=>"Ingrese el Apellido Materno"]) !!}
        </div>
    </div>
    <div class="form-group row">
        {!! Form::label('T','Titulo Profesional',['class'=>'col-sm-2 col-form-label']) !!}
        <div class="col-sm-10">
            {!! Form::select('titulo', $titulo, $titulo ,['class'=>'form-control']) !!}
        </div>
    </div>
    <div class="form-group row">
        {!! Form::label('TELF_PROF','Telefono',['class'=>'col-sm-2 col-form-label']) !!}
        <div class="col-sm-10">
            {!! Form::text('telefono',$profesional->TELF_PROF, ['class'=>'form-control','placeholder'=>"Ingrese el Telefono"]) !!}
        </div>
    </div>
    <div class="form-group row">
        {!! Form::label('CI_PROF','CI',['class'=>'col-sm-2 col-form-label']) !!}
        <div class="col-sm-10">
            {!! Form::text('ci', $profesional->CI_PROF, ['class'=>'form-control','placeholder'=>"Ingrese el CI"]) !!}
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
            {!! Form::email('correo', $profesional->CORREO_PROF, ['class'=>'form-control','placeholder'=>"Ingrese un correo"]) !!}
        </div>
    </div>
    <a href="{{ route('profesional.index') }}" class="btn btn-danger">Cancel</a>
    {!! Form::submit('actualizar', ['class'=>'btn btn-success']) !!}
    {!! Form::close() !!}
</div>

@endsection
