<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $organizacion_id
 * @property string $fecha
 * @property string $motivo
 * @property Organizacione $organizacione
 */
class Rechazo extends Model
{
    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    const UPDATED_AT = null;
    const CREATED_AT = null;
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['organizacion_id', 'fecha', 'motivo'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function organizacione()
    {
        return $this->belongsTo('App\Organizacione', 'organizacion_id');
    }
}
