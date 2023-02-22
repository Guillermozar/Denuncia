<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use OwenIt\Auditing\Contracts\Auditable;
/**
 * Class Estado
 * @package App\Models
 * @version February 2, 2023, 12:04 am UTC
 *
 * @property string $nombre
 * @property string $descripcion
 */
class Estado extends Model implements Auditable
{
    use SoftDeletes;
     use \OwenIt\Auditing\Auditable;
    use HasFactory;

    public $table = 'estados';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'nombre',
        'descripcion'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nombre' => 'string',
        'descripcion' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nombre' => 'required',
        'descripcion' => 'required'
    ];

    
}
