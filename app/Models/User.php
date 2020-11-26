<?php
namespace App\Models;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
class User extends Authenticatable
{
use Notifiable;
use HasRoles;
/**
* The attributes that are mass assignable.
*
* @var array
* @property Organizacione[] $organizaciones
*/
const UPDATED_AT = null;
const CREATED_AT = null;
protected $fillable = [
'name', 'email', 'password','apellido','dni','telefono',
];
/**
* The attributes that should be hidden for arrays.
*
* @var array
*/
protected $hidden = [
'password', 'remember_token',
];
/**
* The attributes that should be cast to native types.
*
* @var array
*/
protected $casts = [
'email_verified_at' => 'datetime',
];
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function organizaciones()
    {
        return $this->hasMany('App\Organizacione');
    }
}
