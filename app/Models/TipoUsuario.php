<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
* Modelo ORM de la tabla Envios
* 
* @property Integer $id_tipo_usuario
* @property String $nombre
*/
class TipoUsuario extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_tipo_usuario';

    protected $guarded = [];
}
