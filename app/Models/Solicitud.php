<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class solicitudes extends Model
{
    use HasFactory;

    protected $table='solicitudes';


    static $rules=[
        'Nombre'=>'required',
        'Descripcion'=>'required',
        'FechaInicio'=>'required',
         'FechaFin'=>'required',
    ];

    protected $fillable=['Nombre','Descripcion','FechaInicio','FechaFin'];

    protected $dates = [
        'FechaInicio',
        'FechaFin',
        // your other new column
    ];


}
