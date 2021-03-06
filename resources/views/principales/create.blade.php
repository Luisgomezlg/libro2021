@extends('layouts.padre') @section('contenido')


<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Creación de introducciones</title>

  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
  <style>
    .shadow {
      padding: 1.5rem;
    }
  </style>

  <a onclick="window.location='{{ url(" principales/create ") }}'"><button class="btn btn-primary border border-gray-400 rounded ">Añadir Introducción</button></a>

  <div class="container mt-2">
    <div class="mt-10 sm:mt-0">
      <div class="md:grid md:grid-cols-3 md:gap-6">
        <div class="md:col-span-1">
          <div class="px-4 sm:px-0">
            <h3 class="font-weight-bold">Creación de introducciones</h3>
            <p class="mt-1 text-sm text-gray-600">
              Seleccióne para crear un logo o una introduccion con el título y su Descripción. Tenga en que solo debe hacer una insercion por cada introducción. (Si desea colocar un titúlo y una descripción para la introducción cliente, de agregar título vista cliente
              y descripción cliente, igual para la parte administrativa. Si desea que aparezca otro titulo y otra introducción, solo basta con editar la introducción insertada.)
            </p>
          </div>
        </div>
        <div class="mt-5 md:mt-0 md:col-span-2">
          <form action="{{ action('principalController@store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="shadow overflow-hidden sm:rounded-md">
              <div class="px-4 py-5 bg-white sm:p-6">
                <div class="col-span-6 sm:col-span-3">
                  <label for="first-name" class="block text-sm font-medium text-gray-700">Seleccionar</label>
                  <select id="principal" name="principal" autocomplete="country" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    <option class="option" value="">Seleccionar</option>
                    <option class="option" id="" value="1">Subir logo</option>
                    <option class="option" id="" value="2">Subir Introducción</option>
                  </select>
                </div>
                <div id="image-logo" style="display: none;" class="grid grid-cols-6 gap-6">
                  <div class="col-span-6 sm:col-span-3">
                    <label for="last-name" class="block text-sm font-medium text-gray-700">Título imágen</label>
                    <input type="text" name="title_image" id="title_image" autocomplete="family-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                  </div>
                  <div class="col-span-6 sm:col-span-2">
                    <div class="flex text-sm text-gray-600">
                            <label class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                            <img style="display:none;" id="imagenSeleccionada" src="#" width="150" alt=""/>  
                            <span>Subir imagen</span>
                              <input class="container" type="file" name="image_pri"id="image_pri">
                            </label>
                    </div>
                  </div>
                </div>
                <div id="introduccion" style="display: none;" class="grid grid-cols-6 gap-6">
                  <div class="col-span-6 sm:col-span-3">
                    <label for="last-name" class="block text-sm font-medium text-gray-700">Título cliente</label>
                    <input type="text" name="title_cli" id="title_cli" autocomplete="family-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                  </div>
                  <div class="description">
                    <label for="about" class="block text-sm font-medium text-gray-700">
                      Descripción cliente
                    </label>
                    <div class="mt-1">
                      <textarea id="description_cli" name="description_cli" rows="12" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md" placeholder=""></textarea>
                    </div>
                  </div>

                  <div class="col-span-6 sm:col-span-3">
                    <label for="last-name" class="block text-sm font-medium text-gray-700">Título administrativa</label>
                    <input type="text" name="title_adm" id="title_adm" autocomplete="family-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                  </div>
                  <div class="description">
                    <label for="about" class="block text-sm font-medium text-gray-700">
                      Descripción administrativa
                    </label>
                    <div class="mt-1">
                      <textarea id="description_adm" name="description_adm" rows="12" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md" placeholder=""></textarea>
                    </div>
                  </div>
                </div>
                <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                  <button id="butsave" type="submit" class="btn btn-success btn-sm">
                    Guardar
                  </button>
                  <a class="btn btn-secundary btn-sm" onclick="window.location.href='{{ url(" /principales ") }}'">Cancelar
                  </a>
                </div>
              </div>
            </div>
        </div>
        </form>
      </div>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
      $(document).ready(function(e) {
          $('#image_pri').change(function() {
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