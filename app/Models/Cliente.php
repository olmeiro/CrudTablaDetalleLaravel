<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = "cliente";
    public $timestamps = false;

    public $fillable = [
        "nombre",
        "apellido1",
        "apellido2",
        "documento",
        "estado",
        "telefono",
        "correo",
    ];

    public static $rules = [
        "nombre" => 'required|string|max:50',
        "apellido1" => 'required|string|max:50',
        "apellido2" => 'required|string|max:50',
        "documento" => 'required|numeric',
        "estado" => 'in:1,0',
        "telefono" => 'required|numeric|max:13',
        'email' => 'email:rfc,dns'
    ];
}
