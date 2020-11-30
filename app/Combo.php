<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $nombre
 * @property int $stock
 * @property int $cantOrg
 * @property int $contribucion
 * @property int $estado
 * @property CombosPedido[] $combosPedidos
 * @property Producto[] $productos
 */
class Combo extends Model
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
    protected $fillable = ['nombre', 'stock', 'cantOrg', 'contribucion', 'estado'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function combosPedidos()
    {
        return $this->hasMany('App\CombosPedido');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function productos()
    {
        return $this->hasMany('App\Producto');
    }
}
