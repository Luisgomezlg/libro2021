<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Tecnica;
use App\Models\Insumo;
class Metodo extends Model
{
    use HasFactory;
    protected $fillable = ['first_cod', 'ind_cod', 'title', 'description', 'image', 'id_insumo', 'id_tecnica', 'creation_date', 'level', 'order', 'id_user'];

    public function insumo()
    {
        return $this->belongsToMany('App\Models\Insumo');
    }
    public function tecnica()
    {
        return $this->belongsToMany('App\Models\Tecnica');
    }
}
