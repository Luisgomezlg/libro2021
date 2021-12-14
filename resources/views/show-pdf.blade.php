<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
    <title>Vistas PDF</title>
</head>

<style>
    *{
        font-family: Arial, Helvetica, sans-serif
    }
    #accordion {
        background-image: url("../public/images/fondo-osvaldo.png");
    }
    .rounded-circle {
    border-radius: 50% !important;
}
</style>

    <div class="m-5 mt-5">
        @foreach ($list as $li)
        @if (Request::is('metodos-list/*'))
        @foreach ($list as $li)
        <a class="btn btn btn-outline-dark border-dark btn-sm back mb-5" onclick="history.go(-1)">
            <span class="glyphicon glyphicon-arrow-left"></span> Regresar
        </a>
        @endforeach
        @else
        @endif
        @endforeach

        @foreach ($list as $li)
        @if (Request::is('tecnicas-list/*'))
        @foreach ($list as $li)
        <a class="btn btn btn-outline-dark border-dark btn-sm back mb-5" onclick="history.go(-1)">
            <span class="glyphicon glyphicon-arrow-left"></span> Regresar
        </a>
        @endforeach
        @else
        @endif
        @endforeach

        @foreach ($list as $li)
        @if (Request::is('metodos-list/*'))
        @foreach ($list as $li)
        <a class="btn btn btn-outline-dark border-dark btn-sm back mb-5 pdf" target="_blank" href="{{ action('metodoController@createPDF', $li->first_cod) }}">
            <span stroke-width="1.5" data-feather="arrow-left"></span> Convertir a PDF
        </a>
        @endforeach
        @else
        @endif
        @endforeach

        @foreach ($list as $li)
        @if (Request::is('tecnicas-list/*'))
        @foreach ($list as $li)
        <a class="btn btn btn-outline-dark border-dark btn-sm back mb-5 pdf" target="_blank" href="{{ action('tecnicaController@createPDF', $li->first_cod_tec) }}">
            <span stroke-width="1.5" data-feather="arrow-left"></span> Convertir a PDF
        </a>
        @endforeach
        @else
        @endif
        @endforeach

        <div class="bg-white overflow-hidden rounded">
            <div class="border-t border-gray-200">
                <dl>
                    @php
                    $bandera = 0;
                    $bandera1 = 0;
                    @endphp
                    <div id="accordion" class="">
                        @foreach(App\Models\Principal::where('id', '=', 1)->get() as $p)
                        @if($p->image_pri == NULL) @else
                        <div  style="text-align: center" id="image_pri"><img src="../public/image/{{ $p->image_pri }}" width="250px"></div>
                        @endif
                        @endforeach
                        @foreach ($show as $li)

                        {{-- Validación insumo --}}
                        @if ($li->insumo_id != null)
                        @if ($bandera == 0)

                        <h6 class="font-weight-bold">@if (Request::is('tecnicas-list/*', 'tecnica/*')) <p class="font-weight-bold">{{ $li->ind_cod_tec }}</p> @else <p class="font-weight-bold">{{ $li->ind_cod }}</p> @endif @if (Request::is('tecnicas-list/*', 'tecnica/*'))<p class="font-weight-bold">{{ $li->title_tec }}</p>@else<p class="font-weight-bold">{{ $li->title }}</p>@endif</h6>
                        @php
                        $bandera = 1;
                        @endphp
                        <div id="collapseOne" style="display: block;" class="collapse border-0" aria-labelledby="headingOne" data-parent="#accordionExample">
                            @else
                            <p class="font-weight-bold">{!! nl2br(e($li->title_ins)) !!}</p>
                            <p>{!! nl2br(e($li->description_ins)) !!}</p>
                            @endif
                            @else
                            @if ($bandera == 1)
                            @php
                            $bandera = 0;
                            @endphp
                        </div>
                        @endif

                        @if (Request::is('tecnicas-list/*', 'tecnica/*'))
                        <h6 class="font-weight-bold">@if (Request::is('tecnicas-list/*', 'tecnica/*')) <p class="font-weight-bold">{{ $li->ind_cod_tec }}</p> @else <p class="font-weight-bold">{{ $li->ind_cod }}</p> @endif @if (Request::is('tecnicas-list/*', 'tecnica/*'))<p class="font-weight-bold">{{ $li->title_tec }}</p>@else<p class="font-weight-bold">{{ $li->title }}</p>@endif</h6>

                        @if ($li->description_tec != null)
                        <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                            <p class="card-body">
                            <p>{!! nl2br(e($li->description_tec)) !!}</p>
                            @if($li->image_tec == NULL) @else <a target="_blank" href="{{ URL::to('/') }}/image/{{ $li->image_tec }}"><img src="../public/image/{{ $li->image_tec }}" width="500px"></a>@endif
                            <!--<a class="btn btn-secundary fs-1" href="{{ action('tecnicaController@show', $li->first_cod_tec) }}"
                                                  target="_blank">Ver {{ $li->title_tec }}</a>-->
                            </p>
                        </div>
                        @else
                        <div id="collapseOne" style="display: none;" style="margin-bottom: -370px;" class="collapse border-0" aria-labelledby="headingOne" data-parent="#accordionExample">
                            <p class="card-body">
                                @if($li->image_tec == NULL) @else<img src="../public/image/{{ $li->image_tec }}" width="500px">@endif
                            </p>
                        </div>
                        @endif

                        @else
                        {{-- Validación técnica --}}
                        @if ($li->tecnica_id != null)

                        @if ($bandera1 == 0)

                        @php
                        $bandera1 = 1;
                        @endphp
                        <h6 class="font-weight-bold">@if (Request::is('tecnicas-list/*', 'tecnica/*')) <p class="font-weight-bold">{{ $li->ind_cod_tec }}</p> @else <p class="font-weight-bold">{{ $li->ind_cod }}</p> @endif @if (Request::is('tecnicas-list/*', 'tecnica/*'))<p class="font-weight-bold">{{ $li->title_tec }}</p>@else<p class="font-weight-bold">{{ $li->title }}</p>@endif</h6>

                        <div id="collapseOne" style="display: block;" class="collapse border-0" aria-labelledby="headingOne" data-parent="#accordionExample">
                            @if (Request::is('tecnicas-list/*', 'tecnica/*'))
                            <p class="card-body">
                            <p class="font-weight-bold">{!! nl2br(e($li->title_tec)) !!}</p>
                            <p>{!! nl2br(e($li->description_tec)) !!}</p>
                            </p>
                            @endif
                            @else
                            <p class="card-body" style="padding: 0;">
                            <p class="font-weight-bold">{!! nl2br(e($li->title_tec)) !!}</p>
                            <p>{!! nl2br(e($li->description_tec)) !!}</p>
                            </p>
                            @endif
                            @else
                            @if ($bandera1 == 1)
                            @php
                            $bandera1 = 0;
                            @endphp
                        </div>
                        @endif

                        @if ($li->description != null)
                        <h6 class="font-weight-bold">@if (Request::is('tecnicas-list/*', 'tecnica/*')) <p class="font-weight-bold">{{ $li->ind_cod_tec }}</p> @else <p class="font-weight-bold">{{ $li->ind_cod }}</p> @endif @if (Request::is('tecnicas-list/*', 'tecnica/*'))<p class="font-weight-bold">{{ $li->title_tec }}</p>@else<p class="font-weight-bold">{{ $li->title }}</p>@endif</h6>

                        <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                            <p class="card-body">
                                @if($li->title == 'predecesor' || $li->title == 'Predecesor')
                                <p class="font-weight-bold">{!! nl2br(e($li->description)) !!}</p>
                                @else
                                {!! nl2br(e($li->description)) !!}
                                @endif
                                <br>
                            <p class="mt-3">@if($li->image_met == NULL) @else <a target="_blank" href="{{ URL::to('/') }}/image/{{ $li->image_met }}"><img src="../public/image/{{ $li->image_met }}" width="500px"></a>@endif</p>

                            </p>
                        </div>
                        @else
                        <div id="collapseOne" style="margin-bottom: -370px;" class="collapse border-0" aria-labelledby="headingOne" data-parent="#accordionExample">
                            <p class="br card-body">

                            </p>
                        </div>
                        @endif
                        @endif
                        @endif
                        @endif
                        @endforeach
                        <div style="margin-top: 1em;">
                            <p style="text-align: center">www.osvaldolaurido.com</p>
                            <p  style="text-align: center; font-size: 20px">© Osvaldo Laurido &amp; Associates 2022</p>
                        </div>
                    </div>
                </dl>
            </div>
        </div>
    </div>

