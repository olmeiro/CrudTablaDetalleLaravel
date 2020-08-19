<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Insumo extends Model
{
    protected $table = 'insumo';

    protected $fillable = ['nombre_insumo','cantidad','precio'];

    public $timestamps = false;

    public static $rules = [
        'nombre_insumo' => 'required|min:2',
        'cantidad' => 'numeric|required|min:0',
        'precio' => 'numeric|required',
    ];
}
