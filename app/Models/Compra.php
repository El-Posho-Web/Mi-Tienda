<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Producto;
use App\Models\User;
use App\Models\Envio;

/**
* Modelo ORM de la tabla Compras
* 
* @property Integer $id_compra
* @property Integer $id_usuario FK
* @property Float $precio_total
*/
class Compra extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_compra';

    protected $guarded = [];

    /**
    * Relacion 1:1 con tabla usuarios.
    * 
    * @return belongsTo|User
    */
    public function usuario()
    {
        return $this->belongsTo(User::class, 'id_usuario');
    }

    /**
    * Relacion 1:1 con tabla envios.
    * 
    * @return hasOne|Envio
    */
    public function envio()
    {
        return $this->hasOne(Envio::class, 'id_compra');
    }

    /**
    * Relacion M:N con tabla productos.
    * 
    * @return belongsToMany|Producto
    */
    public function productos()
    {
        return $this->belongsToMany(Producto::class, 'compra_producto', 'id_compra', 'id_producto')->withPivot('cantidad');
    }
}
