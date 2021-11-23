@extends('layouts.app')
@section('content')


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categorías</title>
    <link href="{{ asset('css/libro.css') }}" rel="stylesheet">
    <!-- CSS only -->
</head>

<body>
    <style>

    </style>
    <a class="btn btn-primary text-white back mb-5 rounded-circle" onclick="history.go(-1)">
        <span stroke-width="1.5" data-feather="arrow-left"></span>
    </a>
    <div class="mt-5 metodos">
        <div class="bg-white shadow overflow-auto sm:rounded-lg">
            <div class="px-4 py-5 sm:px-6">
                <h2 class="text-lg leading-6 font-medium text-primary font-weight-bold" >
                    Categorías
                </h2>
            </div>
            <div class="border-t border-gray-200">
                <form class="d-flex" action="{{ action('categoriaController@searchC')}}" method="get">
                    <input type="search" name="search" id="search" class="form-control form-control-sm" placeholder="Buscar técnica" aria-controls="example">
                    <button class="btn btn-outline-primary btn-sm ml-5" type="submit"><span stroke-width="1.5" data-feather="search"></span></button>
                </form>
                <dl>
                <div class="row xs-gap vertical-gap">
                        @foreach($list as $li)
                        
                            <div class="col-sm-3">
                                <div class="card" style="width: 100%; height: 100%;">
                                    <div class="card-body">
                                    <a href="#" onclick="window.location='{{ action('categoriaController@show', $li->id)}}'">
                                        <p style="text-align: center;">@if($li->image == NULL) @else
                                            <img src="/image/{{ $li->image}}" style="width: 50%;" width="10">@endif
                                        </p>
                                        <h5 class="card-title h5 text-center">{{$li->title}}</h5>
                                    </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        </div>
                </dl>

            </div>
        </div>
    </div>
</body>
<script>

</script>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>

@endsection