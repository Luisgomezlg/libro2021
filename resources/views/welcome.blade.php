@extends('layouts.app')
@section('content')


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Osvaldo Laurido Associates</title>
</head>

<body>
    <style>

    </style>

    <div class="metodos">
        <div class="bg-white shadow overflow-hidden sm:rounded-lg">
            <div class="text-sm text-gray-900">
                @foreach(App\Models\Principal::where('id', '=', 1)->get() as $p)
                @if($p->image_pri == NULL) @else 
                <img src="/image/{{ $p->image_pri }}" width="300px">
                @endif
                @endforeach
            </div>
        @foreach($principales as $pri)
       

            <div class="border-t border-gray-200">
                <h1 class="font-weight-bold">{{$pri->title_cli}}</h1>
            </div>
            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2 text-justify">
                   <p class="">
                    {!! nl2br(e($pri->description_cli)) !!}
                    </p> 
            </dd>
        @endforeach
        </div>

    </div>

    @endsection