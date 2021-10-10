<?php

use App\Http\Controllers\CapacitacionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\DireccionController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/empleado', function () {
    return view('empleado.index');
});

Route::get('/capacitacion', function () {
    return view('Capacitacion.index');
});

Route::get('/', function () {
    return view('welcome');
});

/*Route::get('/usuario', function () {
    return view('usuario.index');
});

Route::get('/usuario/create', [EmpleadoController::class,'create']);
*/

Route::resource('empleado', EmpleadoController::class)->middleware('auth');
Route::resource('capacitacion', CapacitacionController::class)->middleware('auth');
Route::resource('direccion', DireccionController::class)->middleware('auth');
Auth::routes();

Route::get('/home', [EmpleadoController::class, 'index'])->name('home');

Route::group(['middleware'=>['auth']],function(){
Route::get('/evento', [App\Http\Controllers\EventoController::class, 'index']);
Route::post('/evento/mostrar', [App\Http\Controllers\EventoController::class, 'show']);
Route::post('/evento/agregar', [App\Http\Controllers\EventoController::class, 'store']);
Route::post('/evento/editar/{id}', [App\Http\Controllers\EventoController::class, 'edit']);
Route::post('/evento/actualizar/{evento}', [App\Http\Controllers\EventoController::class, 'update']);
Route::post('/evento/borrar/{id}', [App\Http\Controllers\EventoController::class, 'destroy']);
});

Route::group(['middleware'=>['auth']],function(){
    Route::get('/calendarioEmpleado', [App\Http\Controllers\CalendarioEmpleadoController::class, 'index']);
    Route::post('/calendarioEmpleado/mostrar', [App\Http\Controllers\CalendarioEmpleadoController::class, 'show']);
    Route::post('/calendarioEmpleado/agregar', [App\Http\Controllers\CalendarioEmpleadoController::class, 'store']);
    Route::post('/calendarioEmpleado/editar/{id}', [App\Http\Controllers\CalendarioEmpleadoController::class, 'edit']);
    Route::post('/calendarioEmpleado/actualizar/{calendarioEmpleado}', [App\Http\Controllers\CalendarioEmpleadoController::class, 'update']);
    Route::post('/calendarioEmpleado/borrar/{id}', [App\Http\Controllers\CalendarioEmpleadoController::class, 'destroy']);
    });
 
    
    Route::group(['middleware'=>['auth']],function(){
        Route::get('/calendarioCursos', [App\Http\Controllers\CalendarioCursosController::class, 'index']);
        Route::post('/calendarioCursos/mostrar', [App\Http\Controllers\CalendarioCursosController::class, 'show']);
        Route::post('/calendarioCursos/agregar', [App\Http\Controllers\CalendarioCursosController::class, 'store']);
        Route::post('/calendarioCursos/editar/{id}', [App\Http\Controllers\CalendarioCursosController::class, 'edit']);
        Route::post('/calendarioCursos/actualizar/{calendarioCursos}', [App\Http\Controllers\CalendarioCursosController::class, 'update']);
        Route::post('/calendarioCursos/borrar/{id}', [App\Http\Controllers\CalendarioCursosController::class, 'destroy']);
        });

        
    Route::group(['middleware'=>['auth']],function(){
        Route::get('/calendarioPermiso', [App\Http\Controllers\CalendarioPermisoController::class, 'index']);
        Route::post('/calendarioPermiso/mostrar', [App\Http\Controllers\CalendarioPermisoController::class, 'show']);
        Route::post('/calendarioPermiso/agregar', [App\Http\Controllers\CalendarioPermisoController::class, 'store']);
        Route::post('/calendarioPermiso/editar/{id}', [App\Http\Controllers\CalendarioPermisoController::class, 'edit']);
        Route::post('/calendarioPermiso/actualizar/{calendarioPermisos}', [App\Http\Controllers\CalendarioPermisoController::class, 'update']);
        Route::post('/calendarioPermiso/borrar/{id}', [App\Http\Controllers\CalendarioPermisoController::class, 'destroy']);
        }); 

        Route::group(['middleware'=>['auth']],function(){
        Route::get('/departamentoJefe',[App\Http\Controllers\DepartamentoJefeController::class,'index']);
        });

Route::post('login',function(){
    $credentials = request()->only('email','password');

    $remember = request()->filled('remember');

    if (Auth::attempt($credentials,$remember)){
        request()->session()->regenerate();

        return redirect('empleado.index');
    }
    return redirect('login');
});

// Route::get('/evento',function (){
// $posts = ['cris','omar','ernesto'];
// return view ('evento/index',compact('posts'));
// });

Auth::routes();