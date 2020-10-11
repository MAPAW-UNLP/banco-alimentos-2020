<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $nombre
 * @property string $productos
 * @property int $stock
 * @property int $cantOrg
 * @property int $contribucion
 * @property int $estado
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
    protected $fillable = ['nombre', 'productos', 'stock', 'cantOrg', 'contribucion', 'estado'];

}
