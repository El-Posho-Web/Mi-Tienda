<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Categoria;

class Producto extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_producto';

    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'id_categoria');
    }
}
