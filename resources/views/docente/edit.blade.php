@extends('layouts.principal')
@section('titulo1', 'ACTUALIZAR')
@section('titulo2', 'INFORMACION DEL DOCENTE')
@section('content')

{!! Form::open(['route'=>['docente.update', $docente->id],'method'=>'patch']) !!}

<div class="form-group">
    {!! Form::label('nombre','Nombre') !!}
    {!! Form::text('nombre', $docente -> nombre, ['class'=>'form-control','minlength'=>'3']) !!}
</div>
<div>
    {!! Form::label('apellidopaterno','Apellido Paterno') !!}
    {!! Form::text('apellidopaterno',$docente -> apellidopaterno, ['class'=>'form-control','minlength'=>'3']) !!}
</div>
<div class="form-group">
    {!! Form::label('apellidomaterno','Apellido Materno') !!}
    {!! Form::text('apellidomaterno', $docente -> apellidopaterno, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('titulodocente','Titulo Docente') !!}
    {!! Form::text('titulodocente', $docente -> titulodocente, ['class'=>'form-control','minlength'=>'3']) !!}
</div>
<div class="form-group">
    {!! Form::label('cargahoraria','Carga Horaria') !!}
    {!! Form::text('cargahoraria',$docente -> cargahoraria, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('telefono','Telefono') !!}
    {!! Form::text('telefono', $docente -> telefono, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('correo','Correo Electronico') !!}
    {!! Form::text('correo', $docente -> correo, ['class'=>'form-control','minlength'=>'3']) !!}
</div>
 {!! Form::submit('cancelar', ['route'=>'docente','class'=>'btn btn-danger']) !!}
 {!! Form::submit('actualizar', ['class'=>'btn btn-success']) !!}
 
{!! Form::close() !!}

@endsection