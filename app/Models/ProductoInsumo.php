<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductoInsumo extends Model
{
    protected $table = 'producto_insumo';

    protected $fillable = ['insumo_id','producto_id','cantidad'];

    public static $rules = [
        'insumo_id' => 'required',
        'producto_id' => 'required',
        'cantidad' => 'numeric|min:0',
    ];

    public $timestamps = false;
}
