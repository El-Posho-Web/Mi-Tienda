<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
* Modelo ORM de la tabla Envios
* 
* @property Integer $id_estado_envio
* @property String $nombre
*/
class EstadoEnvio extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_estado_envio';

    protected $guarded = [];
}
