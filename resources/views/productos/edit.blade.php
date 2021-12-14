@extends('layouts.padre')
@section('contenido')


<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Actualizar Productos</title>

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

  </style>
  <div class="container mt-2">
    <div class="mt-10 sm:mt-0">
      <div class="md:grid md:grid-cols-3 md:gap-6">
        <div class="md:col-span-1">
          <div class="px-4 sm:px-0">
            <h3 class="font-weight-bold">Actualización De Productos</h3>
          </div>
        </div>
        <div class="mt-5 md:mt-0 md:col-span-2">
          <form action="{{ route('productos.update', $producto->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="shadow overflow-hidden sm:rounded-md">
              <div class="px-4 py-5 bg-white sm:p-6">
                <div class="grid grid-cols-6 gap-6">
                  <div class="col-span-6 sm:col-span-3">
                    <label for="last-name" class="block text-sm font-medium text-gray-700">Título</label>
                    <input type="text" name="title_ins" value="{{$producto->title_ins}}" id="title_ins" autocomplete="family-name"
                      class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                  </div>

                  <div class="col-span-6 sm:col-span-2">
                    <div class="flex text-sm text-gray-600">
                      <label class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                        @if ($producto->image != null)<img id="imagenSeleccionada" src="/image/{{ $producto->image }}" width="150" alt="" />@else @endif
                        <img style="display:none;" id="imagenSeleccionada" src="#" width="150" alt=""/>  
                        <span>Subir imagen</span>
                        <input type="file" name="image" id="image">
                        <p class="pl-1">o arrastrar y soltar</p>
                      </label>
                    </div>
                    <form onsubmit="submitForm(event)">
                      <button type="button" class="btn btn-danger btn-sm" onclick="imageDeleteproducto({{$producto->id}})">Eliminar Imagen</button>
                    </form>
                  </div>
                  <div class="description">
                    <label for="about" class="block text-sm font-medium text-gray-700">
                      Descripción
                    </label>
                    <div class="mt-1">
                      <textarea id="description_ins" name="description_ins" rows="12"
                        class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md"
                        placeholder="">{{$producto->description_ins}}</textarea>
                    </div>
                  </div>
                </div>
              </div>
              <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                <button id="butsave" type="submit"
                  class="btn btn-success btn-sm">
                  Guardar
                </button>
                <a class="btn btn-secundary btn-sm"
                  onclick="window.location.href='{{ url("productos") }}'">Cancelar</a>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
      $(document).ready(function(e) {

        $('#image').change(function() {
          let reader = new FileReader();
          reader.onload = (e) => {
            $('#imagenSeleccionada').attr('src', e.target.result);
          }
          reader.readAsDataURL(this.files[0]);
          $("#imagenSeleccionada").css("display", "block");

        });
      });
    </script>

    @endsection