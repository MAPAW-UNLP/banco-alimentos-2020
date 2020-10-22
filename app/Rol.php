<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $nombre
 * @property Usuario[] $usuarios
 */
class Rol extends Model
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

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function usuarios()
    {
        return $this->hasMany('App\Usuario');
    }
}
