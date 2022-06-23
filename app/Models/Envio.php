<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Compra;
use App\Models\EstadoEnvio;

class Envio extends Model
{
    use HasFactory;


    protected $primaryKey = 'id_envio';
    protected $guarded = [];

    /* RELACIONES ELOQUENT 1 A 1  */
    public function compra()
    {
        return $this->belongsTo(Compra::class, 'id_compra');
    }
    
    public function estado()
    {
        return $this->belongsTo(EstadoEnvio::class, 'id_estado_envio');
    }
}
