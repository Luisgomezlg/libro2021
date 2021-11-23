<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tecnica extends Model
{
    use HasFactory;
    protected $fillable = ['categoria_id', 'first_cod_tec', 'ind_cod_tec', 'title_tec', 'description_tec', 'image_tec', 'creation_date', 'level', 'order', 'id_user'];

    public function metodo()
    {
        $this->belongsToMany('App\Models\Metodo');
    }
}
