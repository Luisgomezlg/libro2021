<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Metodo;
use App\Models\Tecnica;
class Insumo extends Model
{
    use HasFactory;
    protected $fillable = ['title_ins', 'description_ins', 'image', 'creation_date', 'id_user'];

    public function metodo()
    {
        $this->belongsToMany('App\Models\Metodo');
    }
} 
