<?php

namespace App\Models;

//use Eloquent as Model;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Categoria
 * @package App\Models
 * @version July 11, 2020, 5:00 pm -05
 *
 * @property \Illuminate\Database\Eloquent\Collection $productos
 * @property string $nombre_categoria
 */
class Categoria extends Model
{
    //use SoftDeletes;

    protected $table = 'categoria';
    
    // const CREATED_AT = 'created_at';
    // const UPDATED_AT = 'updated_at';


    //protected $dates = ['deleted_at'];

    public $timestamps = false;


    public $fillable = [
        'nombre_categoria'
    ];

    /**
     * The attributes that should be casted to native types.
     *
    //  * @var array
    //  */
    // protected $casts = [
    //     'id' => 'integer',
    //     'nombre_categoria' => 'string'
    // ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nombre_categoria' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    // public function productos()
    // {
    //     return $this->hasMany(\App\Models\Producto::class, 'categoria_id');
    // }
}
