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

        html,
        body,
        div,
        span,
        h1,
        h2,
        h3,
        h4,
        h5,
        h6,
        p,
        a,
        li,
        fieldset,
        form,
        label,
        table,
        tbody,
        thead,
        tr,
        th,
        td {

            font-size: 100%;
            vertical-align: baseline;
        }

        .cont {
            display: inline-block;
            width: 300px;
        }
    </style>
   <a class="btn btn-primary text-white back mb-5" onclick="history.go(-1)">
        <span stroke-width="1.5" data-feather="arrow-left"></span> Regresar
    </a>
    <div class="mt-5">
    <div class="bg-white shadow overflow-hidden sm:rounded-lg">
        <div class="px-4 py-5 sm:px-6">
            <h3 class="text-lg leading-6 font-medium text-gray-900">
                Lista de metodos
            </h3>
        </div>
        <div class="border-t border-gray-200">
        <form action="{{ action('metodoController@search')}}" method="get">
                    <label for="">
                        Buscar:
                        <input type="search" name="search" id="search" class="form-control form-control-sm" placeholder="Buscar metodo" aria-controls="example">
                    </label>
                </form>
            <dl>
                @foreach($list as $li)
                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">
                    <a href="" onclick="window.location='{{ action('metodoController@show', $li->first_cod)}}'">{{$li->title}}</a>
                    </dt>
                </div>
                @endforeach
            </dl>
        </div>
        </div>
    </div>
</body>
<script>

</script>
<!-- JavaScript Bundle with Popper -->

@endsection