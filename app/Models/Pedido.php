<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $organizacion_id
 * @property integer $turno_id
 * @property int $cantCombos
 * @property int $estado
 * @property Organizacione $organizacione
 * @property Turno $turno
 * @property CombosPedido[] $combosPedidos
 */
class Pedido extends Model
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
    protected $fillable = ['organizacion_id', 'turno_id', 'cantCombos', 'estado'];

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

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function combosPedidos()
    {
        return $this->hasMany('App\CombosPedido');
    }
}
