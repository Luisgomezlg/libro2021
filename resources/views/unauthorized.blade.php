@extends('layouts.app')
@section('content')

<head>
    <title>Autorización</title>
</head>

<style>
    .unauthorized {
        margin: 20%;
        text-align: center;
        font-size: 45px;
        font-weight: 700;
        font-family: century gothic;
    }
</style>

<body>
    <a class="btn btn-brand text-white back" onclick="history.go(-1)">
        <span stroke-width="1.5" data-feather="arrow-left"></span> Regresar
    </a>
    <div class="mt-5">
        <div class="bg-white shadow overflow-hidden sm:rounded-lg mx-auto">
            <div class="px-4 py-5 sm:px-6">
                <h1 class="text-lg leading-6 font-medium text-gray-900 unauthorized">
                    401 Usuario no autorizado
                </h1>
            </div>
        </div>
    </div>
</body>
@endsection