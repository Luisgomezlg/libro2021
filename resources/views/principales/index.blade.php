@extends('layouts.padre')
@section('contenido')

<head>
  <meta http-equiv="Cache-control" content="no-cache">
  <title>Introducciones</title>
</head>

<body>
  <div class="metodos">
    <!-- This example requires Tailwind CSS v2.0+ -->
    <h2>Introducciones</h2>
    <a onclick="window.location='{{ url("principales/create") }}'"><button class="btn btn-primary border border-gray-400 rounded ">Añadir Introducción</button></a>

    <div class="mt-5">
      <div class="flex flex-col">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
          <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
              <table id="example" class="table table-striped table-bordered " style="width:100%">
                <thead class="bg-gray-50">
                  <tr>
                  <th>#</th>
                    <th class="description">Título Vista Clíente</th>
                    <th class="description">Título Vista Administrativa</th>
                    <th class="description">Descripción Vista Clíente</th>
                    <th class="description">Descripción Vista Administrativa</th>
                    <th class="description">Imagen</th>
                    <th>Acciones</th>
                  </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                  @foreach($principales as $pri)
                  <tr>
                  <td class="px-6 py-4 whitespace-nowrap">
                      <div class="text-sm text-gray-900">{{$pri->id}}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                      <div class="text-sm text-gray-900">{{$pri->title_cli}}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                      <div class="text-sm text-gray-900">{{$pri->title_adm}}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                      <div class="text-sm text-gray-900">{{$pri->description_cli}}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                      <div class="text-sm text-gray-900">{{$pri->description_adm}}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                      <div class="text-sm text-gray-900">
                        @if($pri->image_pri == NULL)No tiene gráfico @else
                         <a target="_blank" href="{{ URL::to('/') }}/image/{{ $pri->image_pri }}"><img src="/image/{{ $pri->image_pri }}" width="100px"></a>
                         @endif
                      </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                      <a class="btn btn-edit" onclick="window.location='{{route('principales.edit', $pri->id)}}'"><span stroke-width="1.5" data-feather="edit"></span></a>
                      <a class="btn btn-delete" onclick="deletePrincipal({{$pri->id}})" href=""><span stroke-width="1.5" data-feather="delete"></span></a>
                    </td>
                  </tr>
                  @endforeach
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