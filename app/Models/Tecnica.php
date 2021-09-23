<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tecnica extends Model
{
    use HasFactory;
    protected $fillable = ['categoria_id', 'first_cod', 'ind_cod', 'title', 'description', 'image', 'creation_date', 'level', 'order', 'id_user'];

    public function metodo()
    {
        $this->belongsToMany('App\Models\Metodo');
    }
}
