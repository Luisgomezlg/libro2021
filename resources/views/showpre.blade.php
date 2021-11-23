@extends('layouts.app')
@section('content')

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="RootUI - clean and powerful solution for your Dashboards, Administration areas.">
    <meta name="keywords" content="admin, dashboard, template, react, reactjs, html, jquery, clean">
    <meta name="author" content="nK">
    <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
    <title></title>
</head>

<body>
    <style>
        .shadow {
            padding: 1.5rem;
        }
    </style>
    <a class="btn btn-primary text-white back mb-5 rounded-circle" onclick="history.go(-1)">
        <span stroke-width="1.5" data-feather="arrow-left"></span>
    </a>
    <div class="container mt-5">
        <div class="bg-white shadow overflow-hidden sm:rounded-lg">
            <div class="px-4 py-5 sm:px-6">
                <!--<h3 class="text-lg leading-6 font-medium text-gray-900">
                      Metodo
                    </h3>-->
            </div>
            <div class="mb-4 d-flex">
                @foreach ($list as $li)
                @if (Request::is('metodos/*'))
                @foreach ($list as $li)
                <a class="btn btn btn-outline-dark border-dark btn-sm" href="" onclick="window.location='{{ action('metodoController@show2', $li->first_cod) }}'">PDF</a>
                @endforeach
                @else
                <p></p>
                @endif
                @endforeach
            </div>
          
            <div class="border-t border-gray-200">
                <dl>
                    <div id="accordion" class="mb-5">
                        @foreach ($showpre as $li)
                        <h4>{{ $li->ind_cod }} - {{ $li->title }} </h4>

                        <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                            <p class="card-body">
                            {!! nl2br(e($li->description)) !!}
                                @if($li->image_met == NULL) @else <a target="_blank" href="{{ URL::to('/') }}/image/{{ $li->image_met }}"><img src="/image/{{ $li->image_met }}" width="150px"></a>@endif

                            </p>
                        </div>
                        @endforeach
                    </div>

                </dl>
            </div>
        </div>
    </div>

</body>
@endsection