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
    {!! Form::open(['route'=>'tribunal.store','method'=>'POST']) !!}
    @foreach ($proyectos as $proyecto)
    <div class="form-group row">
        {!! Form::label('id_perfil','Codigo del perfil',['class'=>'col-sm-2 col-form-label']) !!}
        <div class="col-sm-10">
            {!! Form::number('id_perfil', $proyecto->id, ['class'=>'form-control','readonly']) !!}
        </div>
    </div>
    <div class="form-group row">
        {!! Form::label('Estudiante','Estudiante',['class'=>'col-sm-2 col-form-label']) !!}
        <div class="col-sm-10">
            {!! Form::text('Estudiante',  $estudiante , ['class'=>'form-control','readonly']) !!}
        </div>
    </div>
    <div class="form-group row">
        {!! Form::label('nombre_perfil','Nombre del perfil',['class'=>'col-sm-2 col-form-label']) !!}
        <div class="col-sm-10">
            {!! Form::text('nombre_perfil', $proyecto -> TITULO_PERFIL, ['class'=>'form-control','readonly']) !!}
        </div>
    </div>
    @endforeach

    <div class="form-group row">
            {!! Form::label('area','Area',['class'=>'col-sm-2 col-form-label']) !!}
            <div class="form-group col-sm-4">
                {!! Form::text('area', $nombreArea, ['class'=>'form-control','readonly']) !!}
            </div>
            {!! Form::label('subArea','Subarea',['class'=>'col-sm-2 col-form-label']) !!}
            <div class="form-group col-sm-4">
                {!! Form::select('subArea',$nombreSubarea,$nombreSubarea, ['class'=>'form-control','readonly']) !!}
            </div>
    </div>
    <div class="form-group row">
        {!! Form::label('FECHA_INI','Fecha Registro Tribunal',['class'=>'col-sm-2 col-form-label']) !!}
            <div class="form-group col-sm-4">
                {!! Form::date('FECHA_INI', $now, ['class'=>'form-control']) !!}
            </div>
            
        {!! Form::label('FECHA_DEF','Fecha de Defensa',['class'=>'col-sm-2 col-form-label']) !!}
        <div class="form-group col-sm-4">
            {!! Form::date('FECHA_DEF',$now, ['class'=>'form-control']) !!}
        </div>
    </div>

        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th scope="col">Codigo</th>
                    <th scope="col">Docente</th>
                    <th scope="col">Tutor</th>
                    <th scope="col">Tribunal</th>
                    <th scope="col">Seleccionar</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tribunales as $tribunal )
                <tr>
                    <td>{{ $tribunal -> id}} </td>
                    <td>{{ $tribunal -> NOM_PROF}} {{ $tribunal -> AP_PAT_PROF }}</td>
                    <td>
                        @foreach ($tutores as $tutor)
                            @if ($tribunal -> id === $tutor->id )
                                {{ $tutor -> tutor}}
                            @endif
                        @endforeach
                    </td>
                    <td>
                        @foreach ($tribunalesN as $t )
                            @if ($t->id === $tribunal->id)
                                {{ $t -> tribunal}} 
                            @endif
                        @endforeach
                    </td>
                    <td>
                        <div class="text-center">
                            {!! Form::checkbox('docenteTrinunal[]', $tribunal -> id) !!}
                        </div> 
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        
        {!!$tribunales->render("pagination::bootstrap-4")!!}
        <div class="form-group ">
        <a href="{{ route('tribunal.index') }}" class="btn btn-danger">Cancel</a>
            {!! Form::submit('Siguiente', ['type'=>"submit",'class'=>'btn btn-success', 'id'=>"btnreg"]) !!}
        </div>
        {!! Form::close() !!}

</div>
                
@endsection