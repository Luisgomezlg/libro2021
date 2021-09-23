@extends('layouts.padre')
@section('contenido')


<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Creación de detalle de metodo</title>

  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
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
    ul,
    li,
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

    .metodos {
      margin-top: 7em;
    }

    .col-span-6 {
      grid-column: span 2 / span 2;
    }
    option{
      font-size: 1.3em;
    }
  </style>
  <div class="container mt-2">
    <div class="mt-10 sm:mt-0">
      <div class="md:grid md:grid-cols-3 md:gap-6">
        <div class="md:col-span-1">
          <div class="px-4 sm:px-0">
            <h3 class="text-lg font-medium leading-6 text-gray-900">Creación de detalle del metodo</h3>
            <p class="mt-1 text-sm text-gray-600">
              (Aquí va la descripción de como insertar).
            </p>
          </div>
        </div>
        <div class="mt-5 md:mt-0 md:col-span-2">
          <form action="{{ action('DetMetodoController@store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="shadow overflow-hidden sm:rounded-md">
              <div class="px-4 py-5 bg-white sm:p-6">
                <div class="grid grid-cols-6 gap-6">

                  <div class="col-span-6 sm:col-span-3" style="width: 50%;">
                    <label for="first-name" class="block text-sm font-medium text-gray-700">Metodo</label>
                    <select id="id_metodo" name="id_metodo" autocomplete="country" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                      <option>Metodo</option>
                      @foreach(App\Models\Metodo::all() as $met)
                      <option class="option" id="col{{$met->id}}" value="{{$met->id}}">{{$met->title}}</option>
                      @endforeach
                    </select>
                  </div>

                  <div class="col-span-6 sm:col-span-3" style="width: 50%;">
                    <label for="first-name" class="block text-sm font-medium text-gray-700">Tecnica</label>
                    <select id="id_tecnica" name="id_tecnica" autocomplete="country" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                      <option>Tecnica</option>
                      @foreach(App\Models\Tecnica::all() as $tec)
                      <option class="option" id="col{{$tec->id}}" value="{{$tec->id}}">{{$tec->title}}</option>
                      @endforeach
                    </select>
                  </div>

                  <div class="col-span-6 sm:col-span-3">
                    <label for="last-name" class="block text-sm font-medium text-gray-700">Titulo de Insumo</label>
                    <input type="text" name="title_det" id="title_det"  autocomplete="postal-code" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                  </div>

                  <div class="col-span-6 sm:col-span-3">
                    <label for="last-name" class="block text-sm font-medium text-gray-700">Insumo</label>
                    <select class="livesearch form-control p-3" id="id_insumo" name="id_insumo"></select>
                  </div>

                  <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                    <label for="postal-code" class="block text-sm font-medium text-gray-700">Usuario</label>
                    <input type="text" name="id_user" id="id_user" autocomplete="postal-code" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                  </div>
                </div>
              </div>
              <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                <button id="butsave" type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                  Guardar
                </button>
                <a class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-gray bg-white-600 hover:bg-white-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 text-gray-700" onclick="window.location.href='{{ url("det_metodos") }}'">Cancelar</a>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>


    @endsection