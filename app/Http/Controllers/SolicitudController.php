<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Auth\SessionGuard;
use Illuminate\Support\Facades\Auth;
Use App\Models\Empleado;
 



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
        return view('solicitud.index')->with('solicitud',$solicitud);






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
    // return view('solicitud.index');
}

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
