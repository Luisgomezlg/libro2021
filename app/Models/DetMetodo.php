<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetMetodo extends Model
{
    use HasFactory;
    protected $fillable = ['title_det', 'id_metodo', 'id_tecnica', 'id_insumo', 'id_user'];
}
