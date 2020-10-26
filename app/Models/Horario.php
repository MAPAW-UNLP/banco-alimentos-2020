<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $nombre
 */
class Horario extends Model
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
    protected $fillable = ['nombre'];

}
