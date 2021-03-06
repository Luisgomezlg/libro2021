@extends('layouts.padre')
@section('contenido')


<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Creación de Técnicas</title>

  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
  <style>
    .shadow {
      padding: 1.5rem;
    }

    .metodos {
      margin-top: 7em;
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
          <h3 class="font-weight-bold">Creación de Técnicas</h3>
            <p class="mt-1 text-sm text-gray-600">
              Selecciona el Encabezado para representar a la siguiente.
              Digite el indice de dos digitos en adelante ejemplo: (1.1, 1.1.3).
              El campo imagen es opcional.
            </p>
          </div>
        </div>
        <div class="mt-5 md:mt-0 md:col-span-2">
          <form action="{{ action('tecnicaController@store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="shadow overflow-hidden sm:rounded-md">
              <div class="px-4 py-5 bg-white sm:p-6">
                <div class="grid grid-cols-6 gap-6">
           
                  <div class="col-span-6 sm:col-span-2">
                    <label for="first-name" class="block text-sm font-medium text-gray-700">Encabezado De Técnica</label>
                    <select id="id_tecnica" name="id_tecnica" autocomplete="country" required class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                      @foreach($tecnicaP as $tec)
                      <option class="option" id="col{{$tec->id}}" value="{{$tec->id}}">{{$tec->title_tec}}</option>
                      @endforeach
                    </select>
                  </div>
                  
                  <div class="col-span-6 sm:col-span-2">
                    <label for="last-name" class="block text-sm font-medium text-gray-700">Indice</label>
                    <input type="text" name="ind_cod_tec" id="ind_cod_tec" autocomplete="family-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                  </div>

                  <div class="col-span-6 sm:col-span-2">
                    <label for="last-name" class="block text-sm font-medium text-gray-700">Título</label>
                    <input type="text" name="title_tec" id="title_tec" autocomplete="family-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                  </div>

                  <div class="description">
                    <label for="about" class="block text-sm font-medium text-gray-700">
                      Descripción
                    </label>
                    <div class="mt-1">
                      <textarea id="description_tec" name="description_tec" rows="12" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md" placeholder=""></textarea>
                    </div>
                  </div>
                  <div class="col-span-6 sm:col-span-2">
                    <div class="flex text-sm text-gray-600">
                            <label class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                            <img style="display:none;" id="imagenSeleccionada" src="#" width="150" alt=""/>  
                            <span>Subir imagen</span>
                              <input class="container" type="file" name="image_tec"id="image_tec">
                            </label>
                    </div>
                  </div>

                  <!--<div class="col-span-6 sm:col-span-6 lg:col-span-2">
                    <label for="city" class="block text-sm font-medium text-gray-700">Nivel</label>
                    <input type="number" name="level" placeholder="Digitación numérica" id="level" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                  </div>

                  <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                    <label for="state" class="block text-sm font-medium text-gray-700">Orden</label>
                    <input type="number" name="order" placeholder="Digitación numérica" id="order" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                  </div>-->

                </div>
              </div>
              <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
              <button id="butsave" type="submit" class="btn btn-success btn-sm">
                                    Guardar
                                </button>
                                <a class="btn btn-secundary btn-sm" onclick="window.location.href='{{ url("tecnicas") }}'">Cancelar</a>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function(e) {
            $('#image_tec').change(function() {
                let reader = new FileReader();
                reader.onload = (e) => {
                    $('#imagenSeleccionada').attr('src', e.target.result);
                    $('#imagenSeleccionada').css('width', '50%');
                    $('#imagenSeleccionada').css('height', '50%');
                }
                reader.readAsDataURL(this.files[0]);
                $("#imagenSeleccionada").css("display", "block");
            });
        });
    </script>

    @endsection