<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\DiaFeriado;
use App\Models\Empleado;
use Illuminate\Http\Request;
use App\Models\Vacaciones;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;



class VacacionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $user = Auth::user();


        $solicitud = Empleado::query()->where('CorreoElectronico','=',$user->email)
            // ->select('*')->where('RPE','=','TF567')
            ->first();

        $validaciones = Vacaciones::all();
        $nombres = DB::table('empleados')->join('solicitudes','empleados.RPE', '=', 'solicitudes.RPE')->select('empleados.*')->get()->all();

        return view('vacaciones.index',compact('validaciones', 'nombres'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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

        /////SI SECRETARIO

        $encontrar = Vacaciones::find($id);

        return view('vacaciones.show', compact('encontrar'));

         //SI JEFE DE LUGAR DE TRABAJO
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vacaciones  $vacaciones
     * @return \Illuminate\Http\Response
     */
    public function edit(Vacaciones $vacaciones)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vacaciones  $vacaciones
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vacaciones $vacaciones)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vacaciones  $vacaciones
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vacaciones $vacaciones)
    {
        //
    }
}
