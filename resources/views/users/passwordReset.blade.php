@extends('layouts.app')
@section('content')


<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Actualización De Contraseña</title>
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
  <style>
    .shadow {
      padding: 1.5rem;
    }

    .col-span-6 {
      grid-column: span 2 / span 2;
    }
  </style>
  <div class="container mt-2">
    <div class="mt-10 sm:mt-0">
      <div class="md:grid md:grid-cols-3 md:gap-6">
        <div class="md:col-span-1">
          <div class="px-4 sm:px-0">
            <h3 class="font-weight-bold">Actualización De Contraseña</h3>
            <p class="mt-1 text-sm text-gray-600">
              Escribe tu nueva contraseña en el campo que está vacio y guarda.
            </p>
          </div>
        </div>
        <div class="mt-5 md:mt-0 md:col-span-2">
            <form action="{{ route('users.password', \Auth::user()->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="shadow overflow-hidden sm:rounded-md">
              <div class="px-4 py-5 bg-white sm:p-6">
                <div class="grid grid-cols-6 gap-6">
                  <div class="col-span-6 sm:col-span-3">
                    <label for="last-name" class="block text-sm font-medium text-gray-700">Nombre</label>
                    <input type="text" name="name" id="name" disabled value="{{ Auth::user()->name}} {{ Auth::user()->lastName}}" autocomplete="family-name"
                      class="mt-1 text-white focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 bg-gray-500 rounded-md">
                  </div>

                  <div class="col-span-6 sm:col-span-3">
                    <label for="last-name" class="block text-sm font-medium text-gray-700">Escriba su nueva contraseña</label>
                    <input type="password" name="password" id="password" value="" autocomplete="family-name"
                      class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                  </div>
                </div>
              </div>
              <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                <button id="butsave" type="submit"
                  class="btn btn-success">
                  Guardar
                </button>
                <a class="btn btn-secundary"
                  onclick="window.location.href='{{ url("/") }}'">Cancelar</a>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>


    @endsection