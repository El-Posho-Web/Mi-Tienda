<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Compra;

class Envio extends Model
{
    use HasFactory;


    protected $primaryKey = 'id_envio';
    protected $guarded = [];

    public function compra()
    {
        return $this->belongsTo(Compra::class, 'id_compra');
    }
}
