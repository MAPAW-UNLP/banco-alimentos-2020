<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $organizacion_id
 * @property int $dia
 * @property int $cant
 * @property Organizacione $organizacione
 */
class CantPersonasServicios extends Model
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
    protected $fillable = ['organizacion_id', 'dia', 'cant'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function organizacione()
    {
        return $this->belongsTo('App\Organizacione', 'organizacion_id');
    }
}
