<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Compra;
use App\Models\EstadoEnvio;

/**
* Modelo ORM de la tabla Envios
* 
* @property Integer $id_envio
* @property Integer $id_compra FK
* @property Integer $id_estado_envio FK
* @property String $direccion
*/
class Envio extends Model
{
    use HasFactory;


    protected $primaryKey = 'id_envio';
    protected $guarded = [];

    /**
    * Relacion 1:1 con tabla compra.
    * 
    * @return belongsTo|Compra
    */
    public function compra()
    {
        return $this->belongsTo(Compra::class, 'id_compra');
    }

    /**
    * Relacion 1:M con tabla EstadoEnvio.
    * 
    * @return belongsTo|EstadoEnvio
    */
    public function estado()
    {
        return $this->belongsTo(EstadoEnvio::class, 'id_estado_envio');
    }
}
