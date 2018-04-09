@extends('layouts.principal')
@section('titulo1', 'ACTUALIZAR')
@section('titulo2', 'INFORMACION DEL DOCENTE')
@section('content')

{!! Form::open(['route'=>['docente.update', $docente->id],'method'=>'patch']) !!}

<div class="form-group">
    {!! Form::label('nombre','Nombre') !!}
    {!! Form::text('nombre', $docente -> nombre, ['class'=>'form-control']) !!}
</div>
<div>
    {!! Form::label('apellidopaterno','Apellido Paterno') !!}
    {!! Form::text('apellidopaterno',$docente -> apellidopaterno, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('apellidomaterno','Apellido Materno') !!}
    {!! Form::text('apellidomaterno', $docente -> apellidopaterno, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('titulodocente','Titulo Docente') !!}
    {!! Form::text('titulodocente', $docente -> titulodocente, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('cargahoraria','Carga Horaria') !!}
    {!! Form::text('cargahoraria',$docente -> cargahoraria, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('telefono','Telefono') !!}
    {!! Form::text('Telefono', $docente -> telefono, ['class'=>'form-control']) !!}
</div>
 {!! Form::submit('cancelar', ['route'=>'docente','class'=>'btn btn-succes']) !!}
 {!! Form::submit('actualizar', ['class'=>'btn btn-succes']) !!}
 
{!! Form::close() !!}

@stop