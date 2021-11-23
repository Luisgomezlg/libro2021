<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class insumo_metodo extends Model
{
    use HasFactory;
    protected $fillable = ['insumo_id', 'metodo_id', 'tecnica_id', 'id_user'];

}
