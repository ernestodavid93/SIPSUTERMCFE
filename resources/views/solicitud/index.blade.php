@extends('adminlte::page')
@section('title', 'SIPSUTERMCFE')
@section('content_header')

<link rel="stylesheet" href="{{ asset('css/estilos.css') }}">

@section('title', 'SIPSUTERMCFE')


    <h1>Solicitud Vacaciones Empleados</h1><br/>


  


{{--     
    @foreach ($solicitud as $solicitud) --}}

{{--         
      <table>
      <tr>
        {{-- <td>{{ $solicitud->id }}</td> --}}
      {{-- <td>{{ $solicitud->Nombre }}</td>
      <td>{{ $solicitud->ApellidoPaterno }}</td> --}}
      {{-- <td>{{ \Carbon\Carbon::parse($solicitud->FechaInicio)->format('d/m/Y')}} </td>
      <td>{{ \Carbon\Carbon::parse($solicitud->FechaFin)->format('d/m/Y')}} </td> --}}
      {{-- </tr>
    </table> --}}
   
    {{-- @endforeach
 --}}


<?php


$dbDate = \Carbon\Carbon::parse($solicitud->FechaIngreso);
$diffYears = \Carbon\Carbon::now()->diffInYears($dbDate);

$diasHabiles = 0;


if($diffYears == 0){
    echo "No tienes dias disponibles";
}
elseif ($diffYears == 1) {
    $diasHabiles = 12;
}
elseif ($diffYears == 2) {
    $diasHabiles = 17;
}
elseif ($diffYears >= 3 AND $diffYears <= 5) {
    $diasHabiles = 20;    
    //echo "5 días habiles";
    //Se hace de 3 a 5 y no comtemplando 6 a 9 por si se necesita calcular el pago adicional
}
elseif ($diffYears >= 6 && $diffYears <= 9) {
    $diasHabiles = 20;          //Se hace de 3 a 5 y no comtemplando 6 a 9 por si se necesita calcular el pago adicional
}
elseif ($diffYears >= 10 && $diffYears <= 20) {
    $diasHabiles = 24;          //Se hace de 3 a 5 y no comtemplando 6 a 9 por si se necesita calcular el pago adicional
}
elseif ($diffYears >= 21 && $diffYears <= 24) {
    $diasHabiles = 24;          //Se hace de 3 a 5 y no comtemplando 6 a 9 por si se necesita calcular el pago adicional
}
elseif ($diffYears >= 25) {
    $diasHabiles = 24;          //Se hace de 3 a 5 y no comtemplando 6 a 9 por si se necesita calcular el pago adicional
}else{
    echo "Error";
}

?>

<div class="alert alert-success text-center" role="alert">
    <?php echo "¡Tienes ",  $diasHabiles, " días hábiles de vacaciones!"; ?>
  </div>


  

 <div class="container">
    
    <div class="form-group">
        <label for="Nombre"> Nombre </label>
        <input type="text" class="form-control" name="Nombre" id="Nombre" value="{{$solicitud->Nombre}}">
    </div>

    <div class="form-group">
        <label for="Nombre"> Apellido Paterno </label>
        <input type="text" class="form-control" name="ApellidoPaterno" id="ApellidoPaterno" value="{{$solicitud->ApellidoPaterno}}">
    </div> 

    <div class="form-group">
        <label for="Nombre"> Apellido Materno </label>
        <input type="text" class="form-control" name="ApellidoMaterno" id="ApellidoMaterno" value="{{$solicitud->ApellidoMaterno}}">
    </div>

    <div class="form-group">
        <label for="RPE"> RPE </label>
        <input type="text" class="form-control" name="RPE" id="RPE" value="{{$solicitud->RPE}}">
    </div>

    <div class="form-group">
        <label for="Nombre"> Contrato </label>
        <input type="text" class="form-control" name="Contrato" id="Contrato" value="{{$solicitud->Contrato}}">
    </div>

    <div class="form-group">
        <label for="Nombre"> Fecha de Antiguedad </label>
        <input type="date" class="form-control" name="FechaIngreso" id="FechaIngreso" value="{{$solicitud->FechaIngreso}}">
    </div>

    <div class="form-group">
    <label for="FechaInicio">Fecha de inicio  </label>
    <input type="date" class="form-control" name="FechaInicio" id="FechaInicio" value="{{$solicitud->FechaIngreso}}">
    
    </div>
    
    <div class="form-group">
    <label for="FechaFin"> Fecha final </label>
    <input type="date" class="form-control" name="FechaFinal" id="FechaFinal" value="{{$solicitud->FechaIngreso}}">

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


        