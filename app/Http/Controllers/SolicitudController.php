<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Auth\SessionGuard;
use Illuminate\Support\Facades\Auth;

use App\Models\Empleado;
use App\Models\Solicitud;





use Carbon\Carbon;

class SolicitudController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     *
     *
     */

    // public function build()
    // {
    //     return $this->view('solicitud.index')
    //         ->with('data', [
    //             'image' => $solicitudes = \DB::table('empleados')
    //             ->select('*')->where('RPE','=','TF567')
    //             ->get(),
    //         ]);
    // }


    public function index()
    {



            // Obtiene el ID del Usuario Autenticado
            $user = Auth::user();


        $solicitud = Empleado::query()->where('CorreoElectronico','=',$user->email)
        // ->select('*')->where('RPE','=','TF567')
        ->first();
        return view('solicitud.index')->with('solicitud', $solicitud);






		// $listaSolicitudes=SolicitudController::all();

		// return view('solicitud.index', array('listaSolicitudes', $listaSolicitudes));


    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
{
    return view('solicitud.index');
}

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return int
     */
    public function store(Request $request)
    {


         /*$solicitud = new Solicitud();
         $solicitud->RPE = $request->input("RPE");
         $solicitud->Nombre = $request->input('Nombre');
         $solicitud->Descripcion = $request->input('Descripcion');
         $solicitud->FechaInicio = $request->input('FechaInicio');
         $solicitud->FechaFin = $request->input('FechaFin');

         //return dd($solicitud);

         $solicitud2 = new Solicitud();
         $solicitud2->FechaInicio = $request->FechaInicio;
         $solicitud2->FechaFin = $request->FechaFin;
         $solicitudVacaciones = Solicitud::whereBetween('FechaInicio', [ $solicitud2->FechaInicio,  $solicitud2->FechaFin])->count();
         $solicitudVacaciones += Solicitud::whereBetween('FechaFin', [ $solicitud2->FechaInicio,  $solicitud2->FechaFin])->count();
         if($solicitudVacaciones!=0){
             return back()->with('mensaje', 'Los dias que solicitaste no estan disponibles');
         }
         else if($solicitudVacaciones==0){
            $solicitud->save();
            return back()->with('mensaje', 'La solicitud se almaceno correctamente');
         }
        else{
            return back()->with('mensaje', 'error inesperado');
        }*/
        $FechaInicio = Carbon::parse(input('FechaInicio'));
        $FechaFin = Carbon::parse(input('FechaFin'));
        $diasDiferencia = $FechaFin->diffInDays($FechaInicio);

        return view('solicitud.index')->with($diasDiferencia);


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
