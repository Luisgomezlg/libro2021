@extends('layouts.padre')
@section('contenido')


    <head>
        <title>Administrador</title>
    </head>

    <body>
        <style>

        </style>

        <div class="metodos">
            <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                <div class="text-sm text-gray-900">
                    @foreach (App\Models\Principal::where('id', '=', 1)->get() as $p)
                    @if ($p->image_pri == null) @else
                            <img src="/image/{{ $p->image_pri }}" width="300px">
                        @endif
                    @endforeach
                </div>
                @foreach ($principales as $pri)
                    <div class="border-t border-gray-200">
                        <h1 class="font-weight-bold">{{ $pri->title_adm }}</h1>
                    </div>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                        <p class="">{{ $pri->description_adm }}</p>
                    </dd>
                @endforeach
            </div>
        </div>

    </body>
    <script>

    </script>
    <!-- JavaScript Bundle with Popper -->

@endsection
