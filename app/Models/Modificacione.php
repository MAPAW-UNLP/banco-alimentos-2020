<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $organizacion_id
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
 * @property Organizacione $organizacione
 */
class Modificacione extends Model
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
    protected $fillable = ['organizacion_id', 'nombre', 'barrio', 'localidad', 'telefono', 'direccion', 'personeria_juridica', 'aval', 'cantPers', 'edad', 'ayuda_alimentaria', 'ayuda_financiera', 'tipo_servicio', 'tarea', 'estado'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function organizacione()
    {
        return $this->belongsTo('App\Organizacione', 'organizacion_id');
    }
}
