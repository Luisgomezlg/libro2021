@extends('layouts.padre')
@section('contenido')

<head>
  <meta http-equiv="Cache-control" content="no-cache">
  <title>Listado de técnicas</title>
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
    applet,
    object,
    iframe,
    h1,
    h2,
    h3,
    h4,
    h5,
    h6,
    p,
    a {
      font-size: 100%;
      vertical-align: baseline;
    }


    .metodos {
      margin-top: 7em;
    }
  </style>

  <div class="metodos">
    <!-- This example requires Tailwind CSS v2.0+ -->
    <a onclick="window.location='{{ url("tecnicas/create") }}'"><button class="btn btn-brand border border-gray-400 rounded ">Añadir tecnica</button></a>

    <div class="mt-5">
      <div class="flex flex-col">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
          <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
              <table id="example" class="table table-striped table-bordered " style="width:100%">
                <thead class="bg-gray-50">
                  <tr>
                    <th>Categoria</th>
                    <th>Titulo</th>
                    <th class="description">Descripción</th>
                    <th>Fecha</th>
                    <th>Nivel</th>
                    <th>Orden</th>
                    <th>Usuario</th>
                    <th>Aciones</th>
                  </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                  @foreach($tecnicas as $tec)
                  <tr>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                      <div class="text-sm text-gray-900">{{$tec->categoria_id}}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                      <div class="text-sm text-gray-900">{{$tec->title}}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                      <div class="text-sm text-gray-900">{{$tec->description}}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                      <div class="text-sm text-gray-900">{{$tec->creation_date}}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                      <div class="text-sm text-gray-900">{{$tec->level}}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                      <div class="text-sm text-gray-900">{{$tec->order}}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                      <div class="text-sm text-gray-900">{{$tec->id_user}}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                      <a href="{{route('tecnicas.edit', $tec->id)}}">Editar</a>
                      <a class="btn btn-delete" href=""><span stroke-width="1.5" data-feather="delete"></span></a>
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