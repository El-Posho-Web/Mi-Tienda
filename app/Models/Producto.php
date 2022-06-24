<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Categoria;

/**
* Modelo ORM de la tabla Productos
* 
* @property Integer $id_producto
* @property Integer $id_categoria FK
* @property String $nombre
* @property String $descripcion
* @property Integer $stock
* @property Float $precio_unitario
*/
class Producto extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_producto';
    protected $guarded = [];

    /**
    * Relacion 1:M con tabla Categorias.
    * 
    * @return belongsTo|Categoria
    */
    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'id_categoria');
    }
}
