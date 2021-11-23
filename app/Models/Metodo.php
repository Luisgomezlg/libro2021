<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Tecnica;
use App\Models\Insumo;
use App\Models\User;
class Metodo extends Model
{
    use HasFactory;
    protected $fillable = ['first_cod', 'ind_cod', 'title', 'description', 'image_met', 'id_insumo', 'id_tecnica', 'creation_date', 'level', 'predecesor_met', 'id_user'];

    public function insumo()
    {
        return $this->belongsToMany('App\Models\Insumo');
    }
    public function tecnica()
    {
        return $this->belongsToMany('App\Models\Tecnica');
    }
    public function getUrlPathAttribute(){
        return \Storage::url($this->image_met);
    }
    public function users()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
    public function tecnicas(){
        return hasmany(Tecnica::class, 'idTecnica');
  }
  /*
                @if($li->tecnica_id != NULL)
                @if($bandera == 0)
                  <h4>{{$li->ind_cod}} @if(Request::is('tecnicas/*')){{$li->title_tec}}@else{{$li->title}} @endif  </h4>
                    @php
                      $bandera = 1;
                    @endphp
                  <div id="collapseOne" class="collapse border-0" aria-labelledby="headingOne" data-parent="#accordionExample">
                    <p class="card-body">
                      {{$li->description}}
                        @if(Request::is('tecnicas/*'))
                          <button class="btn btn-outline-dark pop" data-container="body" data-toggle="popover" data-placement="right" title="{{$li->title_tec}}" data-content="{{$li->description_tec}}">
                            {{$li->title_tec}}
                          </button>
                          @else
                          <button class="btn btn-outline-dark pop" data-container="body" data-toggle="popover" data-placement="right" title="{{$li->title}}" data-content="{{$li->description}}">
                            {{$li->title}} {{$li->title_tec}}
                          </button>
                          @endif
                          <a onclick="window.location='{{ action('tecnicaController@show', $li->first_cod)}}'" target="_blank">Ver tecnica</a>.
                    </p>
                  @else
                      <p class="card-body">
                        {{$li->description}}
                          <button class="btn btn-outline-dark pop" data-container="body" data-toggle="popover" data-placement="right" title="{{$li->title_tec}}" data-content="{{$li->description_tec}}">
                            {{$li->title_tec}}
                          </button> 
                      </p>
                  @endif
                @else
                    @if($bandera == 1)
                      @php
                        $bandera = 0;
                      @endphp
                  </div>
              @endif




              
              @if($li->tecnica_id != NULL)
                @if($bandera == 0)
                  <h4>{{$li->ind_cod}} @if(Request::is('tecnicas/*')){{$li->title_tec}}@else{{$li->title}} @endif  </h4>
                    @php
                      $bandera = 1;
                    @endphp
                  <div id="collapseOne" class="collapse border-0" aria-labelledby="headingOne" data-parent="#accordionExample">
                    <p class="card-body">
                      {{$li->description}}
                        @if(Request::is('tecnicas/*'))
                          <button class="btn btn-outline-dark pop" data-container="body" data-toggle="popover" data-placement="right" title="{{$li->title_tec}}" data-content="{{$li->description_tec}}">
                            {{$li->title_tec}}
                          </button>
                          @else
                          <button class="btn btn-outline-dark pop" data-container="body" data-toggle="popover" data-placement="right" title="{{$li->title}}" data-content="{{$li->description}}">
                            {{$li->title}} {{$li->title_tec}}
                          </button>
                          @endif
                          <a onclick="window.location='{{ action('tecnicaController@show', $li->first_cod)}}'" target="_blank">Ver tecnica</a>.
                    </p>
                  @else
                      <p class="card-body">
                        {{$li->description}}
                          <button class="btn btn-outline-dark pop" data-container="body" data-toggle="popover" data-placement="right" title="{{$li->title_tec}}" data-content="{{$li->description_tec}}">
                            {{$li->title_tec}}
                          </button> 
                      </p>
                  @endif
                @else
                    @if($bandera == 1)
                      @php
                        $bandera = 0;
                      @endphp
                  </div>
              @endif
  */
}

