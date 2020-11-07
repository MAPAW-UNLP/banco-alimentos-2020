<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $organizacion_id
 * @property int $comida
 * @property int $lunes
 * @property int $martes
 * @property int $miercoles
 * @property int $jueves
 * @property int $viernes
 * @property string $rangoHorario
 * @property Organizacione $organizacione
 */
class CantRacionesDias extends Model
{
    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['organizacion_id', 'comida', 'lunes', 'martes', 'miercoles', 'jueves', 'viernes', 'rangoHorario'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function organizacione()
    {
        return $this->belongsTo('App\Organizacione', 'organizacion_id');
    }
}
