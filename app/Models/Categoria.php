<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Producto;

class Categoria extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_categoria';

<<<<<<< HEAD
    public function productos()
    {
        return $this->hasMany(Producto::class, 'id_categoria');
    }
=======
    protected $guarded = [];
>>>>>>> 4369d6eaa487ca5bfd60b95eb894491db6f934c4
}
