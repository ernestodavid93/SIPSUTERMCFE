@extends('adminlte::page')
@section('title', 'SIPSUTERMCFE')
@section('content_header')


@section('css')
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link rel="stylesheet" href="{{ asset('css/estilos.css') }}">
<link rel="preconnect" href="{{asset('https://fonts.googleapis.com')}}" />
<link rel="preconnect" href="{{asset('https://fonts.gstatic.com')}}" crossorigin />


@section('javascripts')
    <script src="<?php echo asset('js/validaciones.js') ?>"></script>
    <script type="text/javascript" src=<?php echo asset('https://cdn.jsdelivr.net/npm/emailjs-com@3/dist/email.min.js') ?>></script>

@show

<style>
    .table-sortable tbody tr {
    cursor: move;
}
</style>
@endsection



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


use Carbon\Carbon;$dbDate = \Carbon\Carbon::parse($solicitud->FechaIngreso);
$diffYears = \Carbon\Carbon::now()->diffInYears($dbDate);

$dbDateRPE = $solicitud->RPE;


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

<br>
    <p>Recuerda que cuentas con <strong>4 periodos</strong> como maximo para agendar tus <strong><?php echo $diasHabiles ?> dias </strong>disponibles.</p>



 <div class="container">
    @if (session('mensaje'))
        <div class="alert alert-success" role="alert">
            <strong>Aviso</strong> {{session('mensaje')}}
            <button type="button" class="close" data-dismiss="alert" alert-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <h2>Registro de Vacaciones</h2>
    <br>


<form action="{{route('solicitud.store')}}" method="post">
    @csrf
    <div class="card">
        <div class="card-body">
            <div class="container">
                <div class="row clearfix">
                    <div class="col-md-12 table-responsive">
                        <table class="table table-bordered table-hover table-sortable" id="tab_logic">
                            <thead class="table-dark" style="background-color:rgb(42, 122, 5)">
                                <tr >
                                    <th class="text-center">
                                        RPE
                                    </th>
                                    <th class="text-center">
                                        Periodo
                                    </th>
                                    <th class="text-center">
                                        Fecha de Inicio
                                    </th>
                                    <th class="text-center">
                                        Fecha de Final
                                    </th>
                                    <th class="text-center">
                                        Descripcion
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <input type="text" class="form-control" name="RPE" id="RPE" value="{{$solicitud->RPE}}">
                                    </td>
                                    <td>
                                        <select class="form-control" name="Nombre" id="Nombre" required>
                                            <option selected disabled>-- Selecciona --</option>
                                            <option value="Primer Periodo">Primer Periodo</option>
                                            <option value="Segundo Periodo">Segundo Periodo</option>
                                            <option value="Tercer Periodo">Tercer Periodo</option>
                                            <option value="Cuarto Periodo">Cuarto Periodo</option>
                                        </select>
                                    </td>
                                    <td>
                                        <input type="date" class="form-control" name="FechaInicio" id="FechaInicio" value="" Onchange="var diasPas = diasPasados();">
                                    </td>
                                    <td>
                                        <input type="date" class="form-control" name="FechaFin" id="FechaFin" class="FechaFin" value=""  Onchange="var diasDif = myFunction();
                                        if(diasDif >= {{$diasHabiles}}){alert('No se pueden agendar más de los permitidos')}else{alert('!Los días que elegiste están disponibles!')}">
                                    </td>
                                    <td>
                                        <textarea name="Descripcion" placeholder="Description" class="form-control" id="Descripcion"></textarea>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <button type="submit" class="btn btn-sm btn-success" onclick="emailJs1();">Guardar</button>
            </div>
        </div>
    </div>

</form>



@endsection
