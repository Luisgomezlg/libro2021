<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Principal extends Model
{
    use HasFactory;
    protected $fillable = ['title_cli', 'title_adm', 'description_cli', 'title_image', 'image_pri', 'description_adm'];

    public function getUrlPathAttribute(){
        return \Storage::url($this->image_pri);
    }

}
