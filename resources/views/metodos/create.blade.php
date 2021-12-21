@extends('layouts.padre')
@section('contenido')


<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Creación De Metodos</title>

  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
  <style>
    .shadow {
      padding: 1.5rem;
    }
  </style>
  <div class="container mt-2">
    <div class="mt-10 sm:mt-0">
      <div class="md:grid md:grid-cols-3 md:gap-6">
        <div class="md:col-span-1">
          <div class="px-4 sm:px-0">
            <h3 class="font-weight-bold">Creación De Metodos</h3>
            <p class="mt-1 text-sm text-gray-600">
              Selecciona el Encabezado para representar el siguiente.
              Digite el indice de dos digitos en adelante ejemplo: (1.1, 1.1.3).
              El campo imagen, insumo y tecnica es opcional.
            </p>
          </div>
            <!--<div class="shadow overflow-hidden sm:rounded-md mt-10">
              <div class="px-4 py-5 bg-white sm:p-6">
                <div class="grid grid-cols-6 gap-6">
                  <div class="col-span-6 sm:col-span-6">
                    <label for="last-name" class="block text-sm font-medium text-gray-700">Guiones</label>
                    <div class="col-span-6 sm:col-span-2">
                      @foreach ($metodoall as $m)
                      @if($metodoall->last() == $metodo->last())
                        <p class="guion">Tienes un guión pendiente</p>
                        @else
                        <p>No tienes guiones</p>
                      @endif
                      @endforeach
                    </div>
                    <div class="col-span-6 sm:col-span-2">
                      <label for="first-name" class="block text-sm font-medium text-gray-700">Encabezado De Métodos</label>
                      <select id="guion" name="guion" autocomplete="country" required class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        <option value="">Seleccionar</option>
                        @foreach($metodoPGuion as $met)
                        <option class="option" value="{{$met->id}}">{{$met->title}}</option>
                        @endforeach
                      </select>
                    </div>
                    <button id="btnguion" type="button" class="btn btn-success mt-10 btnguion btn-sm">Agregar Guión</button>
                  </div>
                </div>
              </div>
            </div>-->
        </div>
        <div class="mt-5 md:mt-0 md:col-span-2">
          <form action="{{ action('metodoController@store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="shadow overflow-hidden sm:rounded-md">
              <div class="px-4 py-5 bg-white sm:p-6">
                <div class="grid grid-cols-6 gap-6">
                  <div class="col-span-6 sm:col-span-2">
                    <label for="first-name" class="block text-sm font-medium text-gray-700">Seleccionar Detalle</label>
                    <select id="select_pre" name="select_pre" autocomplete="country" required class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                      <option class="option" value="">Seleccionar</option>
                      <option class="option" id="" value="2">Metodos o Insumos</option>
                      <option class="option" id="" value="1">Predecesor</option>
                    </select>
                  </div>
                  
                <div class="col-span-6 sm:col-span-2">
                    <label for="first-name" class="block text-sm font-medium text-gray-700">Encabezado De Métodos</label>
                    <select id="id_metodo" name="id_metodo" autocomplete="country" required class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                      <option value="">Seleccionar</option>
                      @foreach($metodoP as $met)
                      <option class="option" id="col{{$met->id}}" value="{{$met->id}}">{{$met->title}}</option>
                      @endforeach
                    </select>
                  </div>
                  <div id="predecesor" style="display: none" class="col-span-6 sm:col-span-2">
                    <label for="first-name" class="block text-sm font-medium text-gray-700">Predecesor</label>
                    <select id="prede" name="pred" autocomplete="country" class="mt-1 prede focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                      <option class="option" value="">Seleccionar</option>
                    </select>
                  </div>
                  <div class="col-span-6 sm:col-span-2">
                    <label for="last-name" class="block text-sm font-medium text-gray-700">Indice</label>
                    <input type="text" name="ind_cod" id="ind_cod" autocomplete="family-name"
                      class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md ">
                  </div>

                  <div id="titulo" class="col-span-6 sm:col-span-2">
                    <label for="last-name" class="block text-sm font-medium text-gray-700">Título</label>
                    <input type="text"  name="title" id="title" autocomplete="family-name"
                      class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                  </div>

                  <div class="description ">
                    <label for="about" class="block text-sm font-medium text-gray-700">
                      Descripción
                    </label>
                    <div class="mt-1">
                      <textarea id="description" name="description" rows="12"
                        class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md"
                        placeholder=""></textarea>
                    </div>
                    <p class="mt-2 text-sm text-gray-500">
                      Descripción Del Metodo.
                    </p>
                  </div>
                  <div class="col-span-6 sm:col-span-2">
                    <div class="flex text-sm text-gray-600">
                            <label class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                            <img style="display:none;" id="imagenSeleccionada" src="#" width="150" alt=""/>  
                            <span>Subir imagen</span>
                              <input class="container" type="file" name="image_met"id="image_met">
                            </label>
                    </div>
                  </div>
                  
                  <div class="col-span-6 sm:col-span-2">
                    <label for="first-name" class="block text-sm font-medium text-gray-700">Insumo/Producto</label>
                    <select id="id_insumo" name="id_insumo[]" multiple="multiple" autocomplete="country" class="insumo mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                  
                    </select>
                  </div>

                  <div class="col-span-6 sm:col-span-2">
                    <label for="first-name" class="block text-sm font-medium text-gray-700">Tecnica</label>
                    <select id="id_tecnica" name="id_tecnica[]" multiple="multiple" autocomplete="country" class="tecnica mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                  
                    </select>
                  </div>
                </div>
              </div>
              <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
              <button id="butsave" type="submit" class="btn btn-success btn-sm">
                                    Guardar
                                </button>
                                <a class="btn btn-secundary btn-sm"
                  onclick="window.location.href='{{ url("metodos") }}'">Cancelar</a>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function(e) {
            $('#image_met').change(function() {
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