@extends('layouts.padre')
@section('contenido')


<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Actualizar Métodos</title>
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
            <h3 class="font-weight-bold">Actualizar Métodos</h3>
          </div>
        </div>
        <div class="mt-5 md:mt-0 md:col-span-2">
          <form action="{{ route('metodos.update', $metodo) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="shadow overflow-hidden sm:rounded-md">
              <div class="px-4 py-5 bg-white sm:p-6">
                <div class="grid grid-cols-6 gap-6">
                  <div class="col-span-6 sm:col-span-2">
                    <label for="last-name" class="block text-sm font-medium text-gray-700">Actual Encabezado</label>
                    @foreach($li as $l) 
                    @if($l->id_metodo == $metodos->first_cod)
                    <input type="text" disabled name="" value="{{$l->title}}" id="" autocomplete="family-name" class="mt-1 bg-gray-400 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    @endif 
                    @endforeach                  
                  </div>
                  
                  <div class="col-span-6 sm:col-span-2">
                    <label for="first-name" class="block text-sm font-medium text-gray-700">Tipo De Detalle</label>
                    <select id="select_pre" name="select_pre" autocomplete="country" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
                      <option class="option" value="">Seleccionar</option>
                      <option class="option" id="" value="2">Metodos o Insumos</option>
                      <option class="option" id="" value="1">Predecesor</option>
                    </select>
                  </div>
                  
                  <div class="col-span-6 sm:col-span-2">
                    <label for="first-name" class="block text-sm font-medium text-gray-700">Encabezado De Método</label>
                    <select id="id_metodo" name="id_metodo" autocomplete="country" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
                      <option value="">Seleccionar</option>
                      @foreach($encabezados as $enc)
                      <option class="option" id="col{{ $enc->first_cod }}" value="{{ $enc->first_cod }}">{{$enc->title}}</option>
                      @endforeach
                      @foreach ($metodoP as $met)
                      @foreach($li as $l) @if($l->metodo_p == $met->first_cod)<option class="option" id="col{{ $met->first_cod }}" selected="selected" value="{{ $met->first_cod }}">{{$l->title}}</option> @endif @endforeach
                      @endforeach
                    </select>
                  </div>
                  <div id="predecesor" style="display: none" class="col-span-6 sm:col-span-2">
                    <label for="first-name" class="block text-sm font-medium text-gray-700">Predecesor</label>
                    <select id="prede" name="pred" autocomplete="country" class="mt-1 prede focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                      @foreach($predecesor as $pre)
                      <option class="option" value="{{$pre->title}}">{{$pre->title}}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="col-span-6 sm:col-span-2">
                    <label for="last-name" class="block text-sm font-medium text-gray-700">Indice</label>
                    <input type="text" name="ind_cod" value="{{ $metodos->ind_cod }}" id="ind_cod" autocomplete="family-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md disabled:opacity-50">
                  </div>

                  <div id="titulo" class="col-span-6 sm:col-span-2">
                    <label for="last-name" class="block text-sm font-medium text-gray-700">Título</label>
                    <input type="text" name="title" id="title" value="{{ $metodos->title }}" autocomplete="family-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                  </div>

                  <div class="description col-span-6 sm:col-span-6">
                    <label for="about" class="block text-sm font-medium text-gray-700">
                      Descripción
                    </label>
                    <div class="mt-1">
                      <textarea id="description" name="description" rows="12" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md text-start" placeholder="">
                        {{$metodos->description}}
                        
                      </textarea>
                    </div>
                  </div>
                  <div class="col-span-6 sm:col-span-2">
                    <div class="flex text-sm text-gray-600">
                      <label class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                        @if ($metodos->image_met != null)<img id="imagenSeleccionada" src="/image/{{ $metodos->image_met }}" width="150" alt="" />@else @endif
                        <img style="display:none;" id="imagenSeleccionada" src="#" width="150" alt=""/>  
                        <span>Subir imagen</span>
                        <input type="file" class="container" name="image_met" id="image_met">
                        <p class="pl-1">o arrastrar y soltar</p>
                      </label>
                    </div>
                    <form onsubmit="submitForm(event)">
                      <button type="button" class="btn btn-danger btn-sm" onclick="imageDeleteMetodo({{$metodos->id}})">Eliminar Imagen</button>
                    </form>
                  </div>
                  <div class="col-span-6 sm:col-span-2">
                    <label for="first-name" class="block text-sm font-medium text-gray-700">Insumo/Producto</label>
                    <select id="id_insumo" name="id_insumo[]" multiple="multiple" autocomplete="country" class="insumo mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                      @foreach ($insumos as $tag)
                      <option value="{{ $tag->id }}" selected="selected">{{ $tag->title_ins }}</option>
                      @endforeach
                      
                    </select>
                  </div>

                  <div class="col-span-6 sm:col-span-2">
                    <label for="first-name" class="block text-sm font-medium text-gray-700">Tecnica</label>
                    <select id="id_tecnica" name="id_tecnica[]" multiple="multiple" autocomplete="country" class="tecnica mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                      @foreach ($tecnicas as $tag)
                      <option value="{{ $tag->id }}" selected="selected">{{ $tag->title_tec }}</option>
                      @endforeach
                    </select>
                  </div>

                  <div class="col-span-2">
                    <label for="street-address" class="block text-sm font-medium text-gray-700">Fecha de
                      actualización</label>
                    <input type="date" name="creation_date" value="{{ $metodos->creation_date }}" id="creation_date" autocomplete="street-address" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                  </div>

                </div>
              </div>
              <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                <button id="butsave" type="submit" class="btn btn-success btn-sm">
                  Guardar
                </button>
                <a class="btn btn-secundary btn-sm" onclick="window.location.href='{{ url('metodos') }}'">Cancelar</a>
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
          }
          reader.readAsDataURL(this.files[0]);
          $("#imagenSeleccionada").css("display", "block");
        });
      });
    </script>
    @endsection