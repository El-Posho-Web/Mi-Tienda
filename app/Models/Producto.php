<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Categoria;

class Producto extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_producto';

<<<<<<< HEAD
    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'id_categoria');
    }
=======
    protected $guarded = [];
>>>>>>> 4369d6eaa487ca5bfd60b95eb894491db6f934c4
}
