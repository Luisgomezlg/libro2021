@extends('layouts.app')
@section('content')


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tecnicas</title>
    <link href="{{ asset('css/libro.css') }}" rel="stylesheet">
    <!-- CSS only -->
</head>

<body>
    <style>
        .shadow {
            padding: 1.5rem;
        }
        .cont {
            display: inline-block;
            width: 300px;
        }
        dt a{
            text-transform: capitalize;
        }
    </style>
    <a class="btn btn-primary text-white back mb-5 rounded-circle" onclick="history.go(-1)">
        <span stroke-width="1.5" data-feather="arrow-left"></span>
    </a>
    <a class="btn btn-secundary back mb-5 rounded-circle" href="/categorias-list">
        <span stroke-width="1.5" data-feather="home"></span>
    </a>
    <div class="mt-5">
        <div class="bg-white shadow overflow-hidden sm:rounded-lg">
            <div class="px-4 py-5 sm:px-6">
                <h2 class="text-lg leading-6 font-medium text-primary font-weight-bold">
                    Técnicas
                </h2>
            </div>
            <div class="border-t border-gray-200">
              <form class="d-flex" action="{{ action('categoriaController@searchC')}}" method="get">
                <input type="search" name="search" id="search" required class="form-control form-control-sm" placeholder="Buscar técnica" aria-controls="example">
                    <button class="btn btn-outline-primary btn-sm ml-5" type="submit"><span stroke-width="1.5" data-feather="search"></span></button>
                </form>
                <dl>
                    @if(!$show->isEmpty())
                    @foreach($show as $li)
                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                            <a href="" class="text-capitalize" onclick="window.location='{{ action('tecnicaController@show', $li->first_cod_tec)}}'">{{$li->title_tec}}</a>
                        </dt>
                    </div>
                    @endforeach
                    @else
                    <p>No hay técnicas</p>
                    @endif

                </dl>
            </div>
        </div>
    </div>
</body>
<script>

</script>
<!-- JavaScript Bundle with Popper -->

@endsection