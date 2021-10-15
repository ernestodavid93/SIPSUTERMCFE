@extends('adminlte::page')
@section('title', 'SIPSUTERMCFE')
@section('content_header')


@section('css')
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link rel="stylesheet" href="{{ asset('css/estilos.css') }}">

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
    @if (session('mensaje'))
        <div class="alert alert-success" role="alert">
            <strong>Aviso</strong> {{session('mensaje')}}
            <button type="button" class="close" data-dismiss="alert" alert-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <div class="form-group">
        <label for="RPE"> RPE </label>
        <input type="text" class="form-control" name="RPE" id="RPE" value="{{$solicitud->RPE}}">
    </div>
    
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
        <label for="Nombre"> Contrato </label>
        <input type="text" class="form-control" name="Contrato" id="Contrato" value="{{$solicitud->Contrato}}">
    </div>

    <div class="form-group">
        <label for="Nombre"> Fecha de Antiguedad </label>
        <input type="date" class="form-control" name="FechaIngreso" id="FechaIngreso" value="{{$solicitud->FechaIngreso}}">
    </div>

    <h2>Registro de Vacaciones</h2>
    <br>
    <form action="{{route('solicitud.store')}}" method="post" enctype="multipart/form-data">
        @csrf

        
        <div class="card">
            <div class="card-body">
                <div class="container">
                    <div class="row clearfix">
                        <div class="col-md-12 table-responsive">
                            <table class="table table-bordered table-hover table-sortable" id="tab_logic">
                                <thead>
                                    <tr >
                                        <th class="text-center">
                                            # Periodo
                                        </th>
                                        <th class="text-center">
                                            Nombre
                                        </th>
                                        <th class="text-center">
                                            Fecha de Inicio
                                        </th>
                                        <th class="text-center">
                                            Fecha de Final
                                        </th>
                                        <th class="text-center">
                                            Notes
                                        </th>
                                        <th class="text-center" style="border-top: 1px solid #ffffff; border-right: 1px solid #ffffff;">
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr id='addr0' data-id="0" class="hidden">
                                        <td>
                                            <p>1</p>
                                        </td>
                                        <td data-name="name">
                                            <input type="text" name="Nombre" id="Nombre">
                                        </td>
                                        <td data-name="fechainicio">
                                            <input type="date" class="form-control" name="FechaInicio" id="FechaInicial">
                                        </td>
                                        <td data-name="fechafin">
                                            <input type="date" class="form-control" name="FechaFin" id="FechaFinal">
                                        </td>
                                        <td data-name="Descripcion">
                                            <input type="text" name="Descripcion" id="Descripcion" placeholder="Description" class="form-control">
                                        </td>
                                        <!--
                                        <td data-name="sel">
                                            <select name="sel0">
                                                <option value="">Select Option</option>
                                                <option value="1">Option 1</option>
                                                <option value="2">Option 2</option>
                                                <option value="3">Option 3</option>
                                            </select>
                                        </td>
                                        --> 
                                        <td data-name="del">
                                            <button name="del0" class='btn btn-danger glyphicon glyphicon-remove row-remove'><span aria-hidden="true">X</span></button>
                                        </td>

                                        <td data-name="">
                                            <button type="submit" name="del0" class='btn btn-success glyphicon glyphicon-remove row-remove'><span aria-hidden="true">Enviar</span></button>
                                        </td>

                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <a id="add_row" class="btn btn-primary float-right">Agregar Periodo</a>
                </div>
            </div>
        </div>
    </form>


@endsection

@section('js')
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->

    <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>
    <script src="../js/dinamicos.js"></script>

    <script>

        $(document).ready(function() {
            $("#add_row").on("click", function() {
                // Dynamic Rows Code
                
                // Get max row id and set new id
                var newid = 0;
                $.each($("#tab_logic tr"), function() {
                    if (parseInt($(this).data("id")) > newid) {
                        newid = parseInt($(this).data("id"));
                    }
                });
                newid++;
                
                var tr = $("<tr></tr>", {
                    id: "addr"+newid,
                    "data-id": newid
                });
                
                // loop through each td and create new elements with name of newid
                $.each($("#tab_logic tbody tr:nth(0) td"), function() {
                    var td;
                    var cur_td = $(this);
                    
                    var children = cur_td.children();
                    
                    // add new td and element if it has a nane
                    if ($(this).data("name") !== undefined) {
                        td = $("<td></td>", {
                            "data-name": $(cur_td).data("name")
                        });
                        
                        var c = $(cur_td).find($(children[0]).prop('tagName')).clone().val("");
                        c.attr("name", $(cur_td).data("name") + newid);
                        c.appendTo($(td));
                        td.appendTo($(tr));
                    } else {
                        td = $("<td></td>", {
                            'text': $('#tab_logic tr').length
                        }).appendTo($(tr));
                    }
                });
                
                // add delete button and td
                /*
                $("<td></td>").append(
                    $("<button class='btn btn-danger glyphicon glyphicon-remove row-remove'></button>")
                        .click(function() {
                            $(this).closest("tr").remove();
                        })
                ).appendTo($(tr));
                */
                
                // add the new row
                $(tr).appendTo($('#tab_logic'));
                
                $(tr).find("td button.row-remove").on("click", function() {
                    $(this).closest("tr").remove();
                });
        });


            // Sortable Code
            var fixHelperModified = function(e, tr) {
                var $originals = tr.children();
                var $helper = tr.clone();
            
                $helper.children().each(function(index) {
                    $(this).width($originals.eq(index).width())
                });
                
                return $helper;
            };
        
            $(".table-sortable tbody").sortable({
                helper: fixHelperModified      
            }).disableSelection();

            $(".table-sortable thead").disableSelection();



            $("#add_row").trigger("click");
        });


    </script>
@endsection

        



</div>





        