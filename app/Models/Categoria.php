<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Producto;

/**
* Modelo ORM de la tabla Categorias
* 
* @property Integer $id_catergoria
* @property String $nombre
*/
class Categoria extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_categoria';
    protected $guarded = [];


    /**
    * Relacion 1:M con tabla productos.
    * 
    * @return hasMany|Producto
    */
    public function productos()
    {
        return $this->hasMany(Producto::class, 'id_categoria');
    }
}
