@extends('layouts.padre')
@section('contenido')

<head>
  <meta http-equiv="Cache-control" content="no-cache">
  <title>Categorias</title>
</head>

<body>
  <style>

  </style>

  <div class="metodos">
    <!-- This example requires Tailwind CSS v2.0+ -->
    <h2>Categorias</h2>
    <a onclick="window.location='{{ url('categorias/create') }}'"><button class="btn btn-primary border border-gray-400 rounded ">Añadir categoria</button></a>

    <div class="mt-5">
      <div class="flex flex-col">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
          <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
              <table id="example" class="table table-striped table-bordered " style="width:100%">
                <thead class="bg-gray-50">
                  <tr>
                    <th>#</th>
                    <th>Titulo</th>
                    <th>Fecha</th>
                    <th>Imagen</th>
                    <th>Acciones</th>
                  </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                  @foreach ($categoria as $cat)
                  <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                      <div class="text-sm text-gray-900">{{ $cat->id }}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                      <div class="text-sm text-gray-900">{{ $cat->title }}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                      <div class="text-sm text-gray-900">{{ $cat->creation_date }}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                      <div class="text-sm text-gray-900">@if($cat->image == NULL) @else <a target="_blank" href="{{ URL::to('/') }}/image/{{ $cat->image }}">
                      <img src="/image/{{ $cat->image}}" width="100px"></a>@endif</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                      <a class="btn btn-edit" onclick="window.location='{{ route('categorias.edit', $cat->id) }}'"><span stroke-width="1.5" data-feather="edit"></span></a>
                      <a class="btn btn-delete" onclick="deleteCategoria({{$cat->id}})" href=""><span stroke-width="1.5" data-feather="delete"></span></a>
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