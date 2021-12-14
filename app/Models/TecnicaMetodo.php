<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TecnicaMetodo extends Model
{
    use HasFactory;
    protected $fillable = ['tecnica_id', 'metodo_id', 'id_user'];

}
