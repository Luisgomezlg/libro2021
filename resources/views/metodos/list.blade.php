@extends('layouts.app')
@section('content')


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Metodos</title>
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

        dt a {
            text-transform: capitalize;
        }

    </style>
    <a class="btn btn-primary text-white back mb-5 rounded-circle" onclick="history.go(-1)">
        <span stroke-width="1.5" data-feather="arrow-left"></span>
    </a>
    <a class="btn btn-secundary back mb-5 rounded-circle" href="/metodos-list">
        <span stroke-width="1.5" data-feather="home"></span>
    </a>
    <div class="mt-5 metodos">
        <div class="bg-white shadow overflow-auto sm:rounded-lg">
            <div class="px-4 py-5 sm:px-6">
                <h2 class="text-lg leading-6 font-medium text-primary font-weight-bold">
                    Métodos
                </h2>
            </div>
            <div class="border-t border-gray-200">
                <form class="d-flex" action="{{ action('metodoController@search') }}" method="get">
                    <input type="search" name="search" id="search" class="form-control form-control-sm" placeholder="Buscar metodo" aria-controls="example">
                    <button class="btn btn-outline-primary btn-sm ml-5" type="submit"><span stroke-width="1.5" data-feather="search"></span></button>
                </form>
                <dl>
                    <div class="row xs-gap vertical-gap">
                        @if (!$list->isEmpty())
                        @foreach ($list as $li)

                        <div class="col-sm-3">
                            <div class="card met" style="width: 100%; height: 100%;">
                                <div class="card-body">
                                    <a href="#" onclick="window.location='{{ action('metodoController@show', $li->first_cod) }}'">
                                        <p style="text-align: center;">
                                            @if ($li->image_met == null) @else
                                            <img src="/image/{{ $li->image_met }}" style="width: 50%;" width="10">
                                            @endif
                                        </p>
                                        <h6 class="card-title h6 text-center">{{ $li->title }}</h6>
                                    </a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @else
                        <p>No hay metodos</p>
                        @endif
                    </div>
                </dl>

            </div>
        </div>
    </div>

</body>
<script>

</script>
<!-- JavaScript Bundle with Popper -->

@endsection