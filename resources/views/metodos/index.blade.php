@extends('layouts.padre')
@section('contenido')

<head>
  <meta http-equiv="Cache-control" content="no-cache">
  <title>Métodos</title>
</head>

<body>
  <style>

  </style>

  <div class="metodos">
    <!-- This example requires Tailwind CSS v2.0+ -->
    <h2>Métodos</h2>

    <a onclick="window.location='{{ url("metodos/create") }}'"><button class="btn btn-primary border border-gray-400 rounded ">Añadir Método</button></a>

    <div class="mt-5">
      <div class="flex flex-col">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
          <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
              <table id="example" class="table table-striped table-bordered " style="width:100%">
                <thead class="bg-gray-50">
                  <tr>
                    <th>Id</th>
                    <th>Encabezado De Método</th>
                    <th>Índice</th>
                    <th>Titulo</th>
                    <th class="description">Descripción</th>
                    <th>Imagen</th>
                    <th>Usuario</th>
                    <th>Acciones</th>
                  </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                  @foreach($metodo as $met)
                  <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                      <div class="text-sm text-gray-900">{{$met->id_metodo}}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                      <div class="text-sm text-gray-900">@foreach($li as $l) @if($l->metodo_p == $met->metodo_p){{$l->title}} @endif @endforeach</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                      <div class="text-sm text-gray-900">{{$met->ind_cod}}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                      <div class="text-sm text-gray-900">{{$met->title}}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                      <div class="text-sm text-gray-900">{!! nl2br(e($met->description)) !!}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                      <div class="text-sm text-gray-900">
                        @if($met->image_met == NULL)No tiene gráfico @else
                         <a target="_blank" href="{{ URL::to('/') }}/image/{{ $met->image_met }}"><img src="/image/{{ $met->image_met }}" width="100px"></a>
                         @endif
                      </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                      <div class="text-sm text-gray-900">{{$met->name}}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                      <a class="btn btn-edit" onclick="window.location='{{ route('metodos.edit', $met->id_metodo) }}'"><span stroke-width="1.5" data-feather="edit"></span></a>
                      <a class="btn btn-delete" onclick="deleteMetodo({{$met->id_metodo}})" href=""><span stroke-width="1.5" data-feather="delete"></span></a>
                    </td>
                  </tr>
                  @endforeach
                  <!-- More people... -->
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

@endsection