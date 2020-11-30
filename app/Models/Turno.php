<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $fechaHora
 * @property int $cantTurnos
 * @property int $turnosDisponibles
 * @property Pedido[] $pedidos
 * @property Horario $horario
 */
class Turno extends Model
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
    protected $fillable = ['horario_id','fechaHora', 'cantTurnos', 'turnosDisponibles'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pedidos()
    {
        return $this->hasMany('App\Pedido');
    }
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function horario()
    {
        return $this->belongsTo('App\Horario', 'horario_id');
    }
}
