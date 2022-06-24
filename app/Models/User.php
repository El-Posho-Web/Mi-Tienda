<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Compra;

/**
* Modelo ORM de la tabla Productos
* 
* @property Integer $id_producto
* @property Integer $id_tipo_usuario FK
* @property String $nombre
* @property String $apellido
* @property String $email
* @property String $password
* @property Integer $dni
*/
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $primaryKey = 'id_usuario';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password'
    ];

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }

    /**
    * Relacion 1:M con tabla Compras.
    * 
    * @return hasMany|Compra
    */
    public function compras()
    {
        return $this->hasMany(Compra::class, 'id_usuario');
    }
}
