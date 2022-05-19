<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Producto;
use App\Models\User;
use App\Models\Envio;

class Compra extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_compra';

    protected $guarded = [];

    public function usuario()
    {
        return $this->belongsTo(User::class, 'id_usuario');
    }

    public function envio()
    {
        return $this->hasOne(Envio::class, 'id_compra');
    }

    public function productos()
    {
        return $this->belongsToMany(Producto::class, 'compra_producto', 'id_compra', 'id_producto')->withPivot('cantidad');
    }
}
