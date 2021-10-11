@extends('layouts.app')
@section('content')

@extends('adminlte::page')


<link rel="stylesheet" href="{{ asset('css/estilos.css') }}">

@section('title', 'SIPSUTERMCFE')


    <h1>Solicitud Vacaciones Empleados</h1>
   
    @section('content_header')
    @foreach($solicitudes as $solicitud)
      <table>
      <tr>
      <td>{{ $solicitud->Nombre }}
      </tr>
    </table>
      @endforeach
    
    @endsection
    

  

<div class="container">
    
    <div class="form-group">
        <label for="Nombre"> Nombre </label>
        <input type="text" class="form-control" name="Nombre" id="Nombre" value="">
    </div>

    <div class="form-group">
        <label for="Nombre"> Apellido Paterno </label>
        <input type="text" class="form-control" name="ApellidoPaterno" id="ApellidoPaterno" value="">
    </div>

    <div class="form-group">
        <label for="Nombre"> Apellido Materno </label>
        <input type="text" class="form-control" name="ApellidoMaterno" id="ApellidoMaterno" value="">
    </div>

    <div class="form-group">
        <label for="RPE"> RPE </label>
        <input type="text" class="form-control" name="RPE" id="RPE" value="">
    </div>

    <div class="form-group">
        <label for="Nombre"> Contrato </label>
        <input type="text" class="form-control" name="Contrato" id="Contrato" value="">
    </div>

    <div class="form-group">
        <label for="Nombre"> Fecha de Antiguedad </label>
        <input type="date" class="form-control" name="FechaIngreso" id="FechaIngreso" value="">
    </div>

    <div class="form-group">
    <label for="FechaInicio">Fecha de inicio  </label>
    <input type="date" class="form-control" name="FechaInicio" id="FechaInicio" value="">
    
    </div>
    
    <div class="form-group">
    <label for="FechaFin"> Fecha final </label>
    <input type="date" class="form-control" name="FechaFinal" id="FechaFinal" value="">

</div>
<div class="modal-footer">

    <button type="button" class="btn btn-success" id="btnGuardar">Guardar</button>
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        
</div>

<div class="modal-footer justify-content-center">   
    
<a class="btn btn-danger" href="">1 Periodo</a>
<a class="btn btn-success" href="">2 Periodo</a>
<a class="btn btn-success" href="">3 Periodo</a>
<a class="btn btn-success" href="">4 Periodo</a>

</div>
</div>

 




@endsection


        