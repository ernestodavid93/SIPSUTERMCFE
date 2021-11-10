@extends('adminlte::page')
@section('title', 'SIPSUTERMCFE')
@section('content_header')



@section('css')
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}"/>
    <link rel="preconnect" href="{{asset('https://fonts.googleapis.com')}}" />
    <link rel="preconnect" href="{{asset('https://fonts.gstatic.com')}}" crossorigin />

@endsection



@section('title', 'SIPSUTERMCFE')
<h1>Autorización de vacaciones</h1><br/>

@if (session('mensaje'))
    <div class="alert alert-success" role="alert">
        <strong>Aviso</strong> {{session('mensaje')}}
        <button type="button" class="close" data-dismiss="alert" alert-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

<table class="table table-bordered table-hover table-sortable text-center" id="tab_logic">

    <thead class="table-dark" style="background-color:rgb(42, 122, 5)">

    <th class="text-center" >
        RPE
    </th>

    <th class="text-center">
        Periodo
    </th>
    <th class="text-center">
        Descripcion
    </th>
    <th class="text-center">
        Fecha Inicio
    </th>
    <th class="text-center">
        Fecha Fin
    </th>
    <th class="text-center">Autorizar</th>
    <th class="text-center">Rechazar</th>
    </tr>
    <tbody>
    @foreach ($validaciones as $validacion)
        <tr>
        <td>{{$validacion->RPE}}</td>
        <td>{{$validacion->Nombre}}</td>
        <td>{{$validacion->Descripcion}}</td>
        <td>{{\Carbon\Carbon::parse($validacion->FechaInicio)->format('d/m/Y')}}</td>
        <td>{{\Carbon\Carbon::parse($validacion->FechaFin)->format('d/m/Y')}}</td>
        <td><a href="{{ route('vacaciones.show', $validacion->id)}}" class="btn btn-success justify-content-between">Autorizar</a></td>
            <td><a href="{{ route('vacaciones.show', $validacion->id)}}" class="btn btn-danger justify-content-between">No autorizar</a></td>
    </tr>
    @endforeach

    </tbody>
</table>


<h2>Solicitudes autorizadas por el secretario </h2>
<table class="table table-bordered table-hover table-sortable text-center" id="tab_logic">

    <thead class="table-dark" style="background-color:rgb(42, 122, 5)">

    <th class="text-center" >
        RPE
    </th>

    <th class="text-center">
        Periodo
    </th>
    <th class="text-center">
        Descripcion
    </th>
    <th class="text-center">
        Fecha Inicio
    </th>
    <th class="text-center">
        Fecha Fin
    </th>
    <th class="text-center">Nombre de quién autoriza</th>
    </tr>
    <tbody>
  {{--x @foreach ($encontrar as $v)
        <tr>
            <td>{{$v->RPE}}</td>
            <td>{{$v->Nombre}}</td>
            <td>{{$v->Descripcion}}</td>
            <td>{{\Carbon\Carbon::parse($v->FechaInicio)->format('d/m/Y')}}</td>
            <td>{{\Carbon\Carbon::parse($v->FechaFin)->format('d/m/Y')}}</td>
            <td><button type="button" class="btn btn-success">Secretario</button></td>
        </tr>
    @endforeach--}}

    </tbody>
</table>

<h2>Solicitudes autorizadas por el jefe de lugar de trabajo </h2>
<table class="table table-bordered table-hover table-sortable text-center" id="tab_logic">

    <thead class="table-dark" style="background-color:rgb(42, 122, 5)">

    <th class="text-center" >
        RPE
    </th>

    <th class="text-center">
        Periodo
    </th>
    <th class="text-center">
        Descripcion
    </th>
    <th class="text-center">
        Fecha Inicio
    </th>
    <th class="text-center">
        Fecha Fin
    </th>
    <th class="text-center">Nombre de quién autoriza</th>
    </tr>
    <tbody>
    {{--@foreach ($validaciones as $validacion)
        <tr>
            <td>{{$validacion->RPE}}</td>
            <td>{{$validacion->Nombre}}</td>
            <td>{{$validacion->Descripcion}}</td>
            <td>{{\Carbon\Carbon::parse($validacion->FechaInicio)->format('d/m/Y')}}</td>
            <td>{{\Carbon\Carbon::parse($validacion->FechaFin)->format('d/m/Y')}}</td>
            <td><button type="button" class="btn btn-success">Autorizar</button></td>
            <td><button type="button" class="btn btn-danger">No autorizar</button></td>
        </tr>
    @endforeach--}}

    </tbody>
</table>







@endsection
