@extends('layouts.principal')
@section('titulo1', 'ASIGNACION')
@section('titulo2', 'DE TRIBUNALES')
@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div><br />
@endif

<div>
    {!! Form::open(['route'=>['tribunal.store',''],'method'=>'patch','data-parsley-validate'=>""]) !!}
    <div class="form-group row">
        {!! Form::label('id','Codigo del perfil',['class'=>'col-sm-2 col-form-label']) !!}
        <div class="col-sm-10">
            {!! Form::number('id', 'id', ['class'=>'form-control','readonly']) !!}
        </div>
    </div>
    <div class="form-group row">
        {!! Form::label('id','Estudiante',['class'=>'col-sm-2 col-form-label']) !!}
        <div class="col-sm-10">
            {!! Form::number('id', 'id', ['class'=>'form-control','readonly']) !!}
        </div>
    </div>
    <div class="form-group row">
        {!! Form::label('id','Nombre del perfil',['class'=>'col-sm-2 col-form-label']) !!}
        <div class="col-sm-10">
            {!! Form::number('id', 'id', ['class'=>'form-control','readonly']) !!}
        </div>
    </div>

    <div class="form-group row">
        {!! Form::label('id','Area',['class'=>'col-sm-2 col-form-label']) !!}
        <div class="form-group col-sm-4">
            {!! Form::number('id', 'id', ['class'=>'form-control','readonly']) !!}
        </div>
        {!! Form::label('id','Subarea',['class'=>'col-sm-2 col-form-label']) !!}
        <div class="form-group col-sm-4">
            {!! Form::number('id', 'id', ['class'=>'form-control','readonly']) !!}
        </div>
    </div>
    <div class="form-group row">
        {!! Form::label('id','Fecha inicio',['class'=>'col-sm-2 col-form-label']) !!}
            <div class="form-group col-sm-4">
                {!! Form::date('fecha_inicio', $now, ['class'=>'form-control']) !!}
            </div>
            {!! Form::label('id','gestion',['class'=>'col-sm-2 col-form-label']) !!}
            <div class="form-group col-sm-4">
                {!! Form::select('id', [12,32,1],null, ['class'=>'form-control']) !!}
            </div>
    </div>
    <div class="form-group row">
        {!! Form::label('id','Fecha limite',['class'=>'col-sm-2 col-form-label']) !!}
            <div class="form-group col-sm-4">
                {!! Form::date('fecha_limite',$now->addYears(2) , ['class'=>'form-control','readonly']) !!}
            </div>
            {!! Form::label('id','Gestion fecha limite',['class'=>'col-sm-2 col-form-label']) !!}
            <div class="form-group col-sm-4">
                {!! Form::select('id', [85,51,45,4],null, ['class'=>'form-control']) !!}
            </div>
    </div>
    <table class="table">
        <thead class="thead-light">
            <tr>
                <th scope="col">Codigo</th>
                <th scope="col">Docente</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tribunales as $tribunal )
            <tr>
                <td>{{ $tribunal -> id}} </td>
                <td>{{ $tribunal -> NOMBRE}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
        
        <div class="form-group ">
            <a href="{{ route('tribunal.index') }}" class="btn btn-danger">Cancel</a>
            {!! Form::submit('aceptar', ['type'=>"submit",'class'=>'btn btn-success', 'id'=>"btnreg"]) !!}
        </div>
        {!! Form::close() !!}
</div>
                
@endsection