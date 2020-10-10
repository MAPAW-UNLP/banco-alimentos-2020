<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $email
 * @property string $password
 * @property string $nombre
 * @property string $barrio
 * @property string $localidad
 * @property string $telefono
 * @property string $direccion
 * @property int $cantPers
 * @property int $estado
 * @property Pedido[] $pedidos
 * @property Rechazo[] $rechazos
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
    protected $fillable = ['email', 'password', 'nombre', 'barrio', 'localidad', 'telefono', 'direccion', 'cantPers', 'estado'];

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
}
