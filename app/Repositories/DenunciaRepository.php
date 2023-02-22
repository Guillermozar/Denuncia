<?php

namespace App\Repositories;

use App\Models\Denuncia;
use App\Repositories\BaseRepository;

/**
 * Class DenunciaRepository
 * @package App\Repositories
 * @version December 5, 2022, 6:37 pm UTC
*/

class DenunciaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'fecha',
        'observacion',
        'descripcion',
        'long',
        'lat',
        'imagen',
        'estado',
        'tipo'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Denuncia::class;
    }
}
