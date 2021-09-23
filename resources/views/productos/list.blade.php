@extends('layouts.app')
@section('content')

<head>
    <title>Productos</title>
</head>

<body>
    <a class="btn btn-primary text-white back mb-5" onclick="history.go(-1)">
        <span stroke-width="1.5" data-feather="arrow-left"></span> Regresar
    </a>
    <div class="mt-5">
        <div class="bg-white shadow overflow-hidden sm:rounded-lg mx-auto">
            <div class="px-4 py-5 sm:px-6">
                <h3 class="text-lg leading-6 font-medium text-gray-900">
                    Lista de productos
                </h3>
            </div>
            <div class="border-t border-gray-200">
                <form action="{{ action('productoController@search')}}" method="get">
                    <label for="">
                        Buscar:
                        <input type="search" name="search" id="search" class="form-control form-control-sm" placeholder="Buscar producto" aria-controls="example">
                    </label>
                </form>
                <dl>
                    @if($list)
                    <div class="p-card">
                    @foreach($list as $li)
                    <div class="product card">
                        <div class="card-header">
                            {{$li->title_ins}}
                        </div>
                        <div class="card-body">
                            <a class="btn btn-primary" href="{{ action('productoController@show', $li->id)}}">Ver producto</a>
                        </div>
                    </div>
                    @endforeach
                    </div>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                              
                    @endif
                </dl>
                {!! $list->links() !!}
            </div>
        </div>
    </div>
</body>
@endsection