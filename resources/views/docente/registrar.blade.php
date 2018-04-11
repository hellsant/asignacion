@extends('layouts.principal')
@section('titulo1', 'REGISTRO')
@section('titulo2', 'DE DOCENTES')
@section('content')

{!! Form::open(['route'=>'docente.store','method'=>'POST']) !!}

<div class="form-group">
    {!! Form::label('nombre','Nombre') !!}
    {!! Form::text('nombre', old('nombre'), ['class'=>'form-control','required' =>'true','minlength'=>'3']) !!}
</div>
<div>
    {!! Form::label('apellidopaterno','Apellido Paterno') !!}
    {!! Form::text('apellidopaterno', old('apellidopaterno'), ['class'=>'form-control','required' =>'true','minlength'=>'3']) !!}
</div>
<div class="form-group">
    {!! Form::label('apellidomaterno','Apellido Materno') !!}
    {!! Form::text('apellidomaterno', old('apellidomaterno'), ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('titulodocente','Titulo Docente') !!}
    {!! Form::text('titulodocente', old('titulodocente'), ['class'=>'form-control','required' =>'true','minlength'=>'3']) !!}
</div>
<div class="form-group">
    {!! Form::label('cargahoraria','Carga Horaria') !!}
    {!! Form::text('cargahoraria', old('cargahoraria'), ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('telefono','Telefono') !!}
    {!! Form::text('telefdono', old('telefono'), ['class'=>'form-control']) !!}

</div>
<div class="form-group">
    {!! Form::label('correo','Correo Electronico') !!}
    {!! Form::email('correo', old('correo'), ['class'=>'form-control','required' =>'true']) !!}
</div>
{!! Form::submit('cancelar', ['route'=>'docente','class'=>'btn btn-danger']) !!}
{!! Form::submit('registrar', ['class'=>'btn btn-success']) !!}
 
{!! Form::close() !!}

@endsection