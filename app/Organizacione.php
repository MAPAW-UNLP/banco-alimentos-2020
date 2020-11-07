<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $user_id
 * @property string $nombre
 * @property string $telefono
 * @property string $domicilio
 * @property string $localidad
 * @property string $personeria_juridica
 * @property string $aval
 * @property int $cantPers
 * @property int $edad
 * @property int $ayuda_alimentaria
 * @property int $ayuda_financiera
 * @property string $tarea
 * @property User $user
 * @property CantPersonasEdad[] $cantPersonasEdads
 * @property CantPersonasServicio[] $cantPersonasServicios
 * @property CantRacionesDia[] $cantRacionesDias
 * @property Modificacione[] $modificaciones
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
    const UPDATED_AT = null;
    const CREATED_AT = null;
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['user_id', 'nombre', 'telefono', 'domicilio', 'localidad', 'personeria_juridica', 'aval', 'cantPers', 'edad', 'ayuda_alimentaria', 'ayuda_financiera', 'tarea'];

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
    public function cantPersonasEdads()
    {
        return $this->hasMany('App\CantPersonasEdad', 'organizacion_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function cantPersonasServicios()
    {
        return $this->hasMany('App\CantPersonasServicio', 'organizacion_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function cantRacionesDias()
    {
        return $this->hasMany('App\CantRacionesDia', 'organizacion_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function modificaciones()
    {
        return $this->hasMany('App\Modificacione', 'organizacion_id');
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
