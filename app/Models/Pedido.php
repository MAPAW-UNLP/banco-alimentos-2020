<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $combo_id
 * @property integer $organizacion_id
 * @property integer $turno_id
 * @property int $cantCombos
 * @property Combo $combo
 * @property Organizacione $organizacione
 * @property Turno $turno
 */
class Pedido extends Model
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
    protected $fillable = ['combo_id', 'organizacion_id', 'turno_id', 'cantCombos','estado'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function combo()
    {
        return $this->belongsTo('App\Combo');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function organizacione()
    {
        return $this->belongsTo('App\Organizacione', 'organizacion_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function turno()
    {
        return $this->belongsTo('App\Turno');
    }
}
