<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $user_id
 * @property string $nombre
 * @property string $barrio
 * @property string $localidad
 * @property string $telefono
 * @property string $direccion
 * @property string $personeria_juridica
 * @property string $aval
 * @property int $cantPers
 * @property int $edad
 * @property int $ayuda_alimentaria
 * @property int $ayuda_financiera
 * @property string $tipo_servicio
 * @property string $tarea
 * @property int $estado
 * @property User $user
 * @property Pedido[] $pedidos
 * @property Rechazo[] $rechazos
 * @property Solicitud[] $solicituds
 */
class Organizacione extends Model
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
    protected $fillable = ['user_id', 'nombre', 'barrio', 'localidad', 'telefono', 'direccion', 'personeria_juridica', 'aval', 'cantPers', 'edad', 'ayuda_alimentaria', 'ayuda_financiera', 'tipo_servicio', 'tarea', 'estado'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pedidos()
    {
        return $this->hasMany('App\Pedido', 'organizacion_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function rechazos()
    {
        return $this->hasMany('App\Rechazo', 'organizacion_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function solicituds()
    {
        return $this->hasMany('App\Solicitud', 'organizacion_id');
    }
}
