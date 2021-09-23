@extends('layouts.app')
@section('content')

<head>
    <title>Tecnicas</title>
</head>

<body>
    <a class="btn btn-brand text-white back" onclick="history.go(-1)">
        <span stroke-width="1.5" data-feather="arrow-left"></span> Regresar
    </a>
    <div class="mt-5">
        <div class="bg-white shadow overflow-hidden sm:rounded-lg">
            <div class="px-4 py-5 sm:px-6">
                <h3 class="text-lg leading-6 font-medium text-gray-900">
                    Lista de técnicas
                </h3>
            </div>
            <div class="border-t border-gray-200">
                <form action="{{ action('tecnicaController@search')}}" method="get">
                    <label for="">
                        Buscar:
                        <input type="search" name="search" id="search" class="form-control form-control-sm" placeholder="Buscar técnica" aria-controls="example">
                    </label>
                </form>
                <dl>
                    @foreach($list as $li)
                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                        <a href="" onclick="window.location='{{ action('tecnicaController@show', $li->first_cod)}}'">{{$li->title}}</a>
                        </dt>
                    </div>
                    @endforeach
                </dl>
                {!! $list->links() !!}
            </div>
        </div>
    </div>
</body>
@endsection