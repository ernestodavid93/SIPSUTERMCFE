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
        $relacion_sec = DB::table("empleados")
            ->join("solicitudes", function($join){
                $join->on("empleados.correoelectronico", "=", "solicitudes.autoriza_email");
            })
            ->select("empleados.nombre", "empleados.apellidopaterno", "empleados.apellidomaterno", "empleados.correoelectronico")
            ->get();

        $relacion_jefe = DB::table("empleados")
            ->join("users", function($join){
                $join->on("empleados.correoelectronico", "=", "users.email");
            })
            ->join("model_has_roles", function($join){
                $join->on("users.id", "=", "model_has_roles.model_id")
                    ->where("model_has_roles.role_id", "=", 3);
            })
            ->get();

        return view('vacaciones.index',compact('user','validaciones', 'nombres','solicitud', 'relacion_sec','relacion_jefe'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

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

       // $encontrar = Vacaciones::find($id);

        //return view('vacaciones.show', compact('encontrar'));

         //SI JEFE DE LUGAR DE TRABAJO
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $vacacionesAux = Vacaciones::find($id);

        return view('vacaciones.index', compact('vacacionesAux'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $vacaciones = Vacaciones::find($id);
        //$vacaciones->update($request->all());
        $vacaciones->RPE = $request->RPE;
        $vacaciones->Nombre = $request->Nombre;
        $vacaciones->Descripcion = $request->Descripcion;
        $vacaciones->FechaInicio = $request->FechaInicio;
        $vacaciones->FechaFin = $request->FechaFin;
        $vacaciones->autoriza_sec = '1';
        //$vacaciones->autoriza_jefe = '1';
        $vacaciones->autoriza_email = $request->autoriza_email;

        $vacaciones->save();
        //return redirect()->route('vacaciones.index');
        return redirect()->route('vacaciones.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vacaciones = Vacaciones::find($id);

        $vacaciones->delete();

        return back();
    }
}
