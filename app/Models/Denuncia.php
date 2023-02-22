<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use OwenIt\Auditing\Contracts\Auditable;
/**
 * Class Denuncia
 * @package App\Models
 * @version December 5, 2022, 6:37 pm UTC
 *
 * @property string $fecha
 * @property string $observacion
 * @property string $descripcion
 * @property string $long
 * @property string $lat
 * @property string $imagen
 * @property string $id_estado
 * @property string $tipo
 */
class Denuncia extends Model implements Auditable
{
    use SoftDeletes;
     use \OwenIt\Auditing\Auditable;
    use HasFactory;

    public $table = 'denuncias';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'fecha',
        'observacion',
        'descripcion',
        'long',
        'lat',
        'imagen',
        'id_estado',
        'tipo',
        'id_user'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'fecha' => 'string',
        'observacion' => 'string',
        'descripcion' => 'string',
        'long' => 'string',
        'lat' => 'string',
        'imagen' => 'string',
        'id_estado' => 'string',
        'tipo' => 'string',
        'id_user' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'fecha' => 'required',
        'observacion' => 'required',
        'descripcion' => 'required',
        'long' => 'required',
        'lat' => 'required',
        'tipo' => 'required'
    ];

    public function estado (){
     return $this-> belongsTo('App\Models\Estado','id_estado');

    }
    public function usuario (){
     return $this-> belongsTo('App\Models\User','id_user');

    }
}
