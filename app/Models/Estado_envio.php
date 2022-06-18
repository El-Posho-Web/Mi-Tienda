<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estado_envio extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_estado_envio';

    protected $guarded = [];
}
