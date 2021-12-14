@extends('layouts.app')
@section('content')

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="RootUI - clean and powerful solution for your Dashboards, Administration areas.">
    <meta name="keywords" content="admin, dashboard, template, react, reactjs, html, jquery, clean">
    <meta name="author" content="nK">
    <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
    <title>@foreach ($show as $li) @if (Request::is('tecnicas/*')) {{ $li->title_tec }} @else {{ $li->title }} @endif @endforeach</title>
</head>

<body>
    <style>
        .shadow {
            padding: 1.5rem;
        }
    </style>
    <a class="btn btn-primary text-white back mb-5 rounded-circle" href="" onclick="history.go(-1)">
        <span stroke-width="1.5" data-feather="arrow-left"></span>
    </a>
    <div class="container mt-5">
        <div class="bg-white shadow overflow-hidden sm:rounded-lg">
            <div class="px-4 py-5 sm:px-6">
            </div>
            <div class="mb-4 d-flex">
                @foreach ($list as $li)
                @if (Request::is('metodos/*'))
                @foreach ($list as $li)
                <a class="btn btn btn-outline-dark border-dark btn-sm back mb-5 pdf" target="_blank" href="{{ action('metodoController@createPDF', $li->first_cod) }}">
                     Convertir a PDF <span stroke-width="1.5" data-feather="arrow-right"></span>
                </a>
                @endforeach
                @else
                <p></p>
                @endif
                @endforeach

                @foreach ($list as $li)
                @if (Request::is('tecnicas/*'))
                @foreach ($list as $li)
                <a class="btn btn btn-outline-dark border-dark btn-sm back mb-5 pdf" target="_blank" href="{{ action('tecnicaController@createPDF', $li->first_cod_tec) }}">
                     Convertir a PDF <span stroke-width="1.5" data-feather="arrow-right"></span>
                </a>
                @endforeach
                @else
                <p></p>
                @endif
                @endforeach

            </div>

            <div class="border-t border-gray-200">
                <dl>
                    @php
                    $bandera = 0;
                    $bandera1 = 0;
                    @endphp
                    <div id="accordion" class="mb-5">
                        @foreach ($show as $li)

                        {{-- Validación insumo --}}
                        @if ($li->insumo_id != null)
                        @if ($bandera == 0)

                        @php
                        $bandera = 1;
                        @endphp
                        <h4>@if (Request::is('tecnicas/*')){{ $li->ind_cod_tec }}@else{{ $li->ind_cod }} @endif @if (Request::is('tecnicas/*')){{ $li->title_tec }}@else{{ $li->title }} @endif </h4>

                        <div id="collapseOne" style="display: block;" class="collapse border-0" aria-labelledby="headingOne" data-parent="#accordionExample">
                        <div style="display: block;">
                                <a tabindex="0" class="btn btn-lg btn-success popover-dismiss text-white mb-3" role="button" data-toggle="popover" data-trigger="focus" 
                            title="{!! nl2br(e($li->title_ins)) !!}" data-content="{!! nl2br(e($li->description_ins)) !!}">{!! nl2br(e($li->title_ins)) !!}</a>
                            </div> 
                        @else
                            <div style="display: block;">
                                <a tabindex="0" class="btn btn-lg btn-success popover-dismiss text-white mb-3" role="button" data-toggle="popover" data-trigger="focus" 
                            title="{!! nl2br(e($li->title_ins)) !!}" data-content="{!! nl2br(e($li->description_ins)) !!}">{!! nl2br(e($li->title_ins)) !!}</a>
                            </div>
                            @endif
                            @else
                            @if ($bandera == 1)
                            @php
                            $bandera = 0;
                            @endphp
                        </div>
                        @endif

                        @if (Request::is('tecnicas/*'))
                        <h4>@if (Request::is('tecnicas/*')){{ $li->ind_cod_tec }}@else{{ $li->ind_cod }} @endif @if (Request::is('tecnicas/*')){{ $li->title_tec }}@else{{ $li->title }} @endif</h4>

                        @if ($li->description_tec != null)
                        <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                            <p class="card-body">
                                {!! nl2br(e($li->description_tec)) !!}
                                @if ($li->image_tec == null) @else <a target="_blank" href="{{ URL::to('/') }}/image/{{ $li->image_tec }}"><img style="margin-left: 10%; width: 80%;" src="/image/{{ $li->image_tec }}"></a>@endif
                            </p>
                        </div>
                        @else
                        <div id="collapseOne" style="display: none;" style="margin-bottom: -370px;" class="collapse border-0" aria-labelledby="headingOne" data-parent="#accordionExample">
                            <p class="card-body">
                                @if ($li->image_tec == null) @else <a target="_blank" href="{{ URL::to('/') }}/image/{{ $li->image_tec }}"><img style="margin-left: 10%; width: 80%;" src="/image/{{ $li->image_tec }}"></a>@endif

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
                        <h4>@if (Request::is('tecnicas/*')){{ $li->ind_cod_tec }}@else{{ $li->ind_cod }} @endif @if (Request::is('tecnicas/*')){{ $li->title_tec }}@else{{ $li->title }} @endif </h4>

                        <div id="collapseOne" style="display: block;" class="collapse border-0" aria-labelledby="headingOne" data-parent="#accordionExample">
                            @if (Request::is('tecnicas/*'))
                            <div style="display: block;">
                                <a style="font-size: 16px; text-transform:capitalize;" class="btn btn-secundary fs-1 text-primary" href="{{ action('tecnicaController@show', $li->first_cod_tec) }}" target="_blank">{{ $li->title_tec }}</a>

                            </div>
                            @else
                            @if ($li->first_cod_tec != null)
                            <div style="display: block;">
                                <a style="font-size: 16px; text-transform:capitalize;" class="btn btn-secundary fs-1 text-primary" href="{{ action('tecnicaController@show', $li->first_cod_tec) }}" target="_blank">{{ $li->title_tec }}</a>

                            </div>
                            @else
                            
                            @endif
                            @endif
                            @else
                            @if ($li->first_cod_tec != null)
                            <div style="display: block;">
                                <a style="font-size: 16px; text-transform:capitalize;" class="btn btn-secundary fs-1 text-primary" href="{{ action('tecnicaController@show', $li->first_cod_tec) }}" target="_blank">{{ $li->title_tec }}</a>

                            </div>
                            @else
                            
                            @endif
                            @endif
                            @else
                            @if ($bandera1 == 1)
                            @php
                            $bandera1 = 0;
                            @endphp
                        </div>
                        @endif

                        @if ($li->description != null)
                        @if($li->ind_cod == "-" || $li->ind_cod == "-")
                        <h4 style="display: none;">@if (Request::is('tecnicas/*')){{ $li->ind_cod_tec }}@else{{ $li->ind_cod }} @endif @if (Request::is('tecnicas/*')){{ $li->title_tec }}@else{{ $li->title }} @endif</h4>
                        @else
                        <h4>@if (Request::is('tecnicas/*')){{ $li->ind_cod_tec }}@else{{ $li->ind_cod }} @endif @if (Request::is('tecnicas/*')){{ $li->title_tec }}@else{{ $li->title }} @endif</h4>
                        @endif
                        <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                            <p class="card-body">
                                @if ($li->title == 'predecesor' || $li->title == 'Predecesor')
                                <a style="font-size: 16px;" class="btn btn-secundary fs-1 text-primary text-capitalize" href="{{ action('metodoController@showpre', $li->predecesor_met) }}" target="_blank">{{ $li->description }}</a>
                                @else
                                {!! nl2br(e($li->description)) !!}
                                @endif
                                <br>
                                @if ($li->image_met == null) @else <a target="_blank" href="{{ URL::to('/') }}/image/{{ $li->image_met }}"><img style="margin-left: 10%; width: 80%;" src="/image/{{ $li->image_met }}"></a>@endif
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
                    </div>

                </dl>
            </div>
        </div>
    </div>

</body>
@endsection