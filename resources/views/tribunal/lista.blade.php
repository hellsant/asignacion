@extends('layouts.principal')
@section('titulo1', 'LISTA')
@section('titulo2', 'DE TRIBINALES')
@section('content')
<div class="table-responsive">
<table class="table">
    <thead class="thead-light">
      <tr>
          <th scope="col">Codigo</th>
          <th scope="col">Nombre Del Proyecto</th>
          <th scope="col">Estudiante</th>
          <th scope="col">Tribunales</th>
          <th scope="col">Fecha Registro</th>
          <th scope="col">Fecha Inicio</th>
          <th scope="col">Fecha Defensa</th>
          <th scope="col">Fecha Limite</th>
          <th scope="col">Fecha Prorroga</th>
          <th scope="col">Opciones</th>
        </tr>
    </thead>
    <tbody>
      
      <tr>
          <td>321</td>
          <td>asdasd</td>
          <td>xcxzcxz</td>
          <td>{!! Form::select('valores',[1,2,3],null,['class'=>'form-control']) !!} </td>
          <td>321</td>
          <td>321</td>
          <td>2822</td>
          <td>852522</td>
          <td>22212</td>
        <td>
            <div class="text-center">
               
            </div> 
            <div class="text-center">
              
            </div> 
        </td>
      </tr>
   
    </tbody>
  </table>
</div>
  
@endsection