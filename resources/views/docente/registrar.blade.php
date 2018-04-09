@extends('layouts.principal')
@section('titulo1', 'REGISTRO')
@section('titulo2', 'DE DOCENTES')
@section('content')

{!! Form::open(['route'=>'docente.store','method'=>'POST']) !!}

<div class="form-group">
    {!! Form::label('nombre','Nombre') !!}
    {!! Form::text('nombre', old('nombre'), ['class'=>'form-control']) !!}
</div>
<div>
    {!! Form::label('apellidopaterno','Apellido Paterno') !!}
    {!! Form::text('apellidopaterno', old('apellidopaterno'), ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('apellidomaterno','Apellido Materno') !!}
    {!! Form::text('apellidomaterno', old('apellidomaterno'), ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('titulodocente','Titulo Docente') !!}
    {!! Form::text('titulodocente', old('titulodocente'), ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('cargahoraria','Carga Horaria') !!}
    {!! Form::text('cargahoraria', old('cargahoraria'), ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('telefono','Telefono') !!}
    {!! Form::text('telefono', old('telefono'), ['class'=>'form-control']) !!}
</div>
 {!! Form::submit('cancelar', ['class'=>'btn btn-succes']) !!}
 {!! Form::submit('registrar', ['class'=>'btn btn-succes']) !!}
 
{!! Form::close() !!}

@endsection