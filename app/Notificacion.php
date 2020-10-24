<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $notificacion
 * @property string $created_at
 * @property string $updated_at
 */
class Notificacion extends Model
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
    protected $fillable = ['notificacion', 'created_at', 'updated_at'];

}
