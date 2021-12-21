@extends('layouts.padre')
@section('contenido')

<head>
  <meta http-equiv="Cache-control" content="no-cache">
  <title>Técnicas Principales</title>
</head>

<body>
  <style>
    .shadow {
      padding: 1.5rem;
    }

    .metodos {
      margin-top: 7em;
    }
  </style>

  <div class="metodos">
    <!-- This example requires Tailwind CSS v2.0+ -->
    <h2>Técnicas Principales</h2>

    <a onclick="window.location='{{ url("tecnicasP/create") }}'"><button class="btn btn-primary border border-gray-400 rounded ">Añadir tecnica principal</button></a>

    <div class="mt-5">
      <div class="flex flex-col">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
          <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
              <div class="loader"></div>
              <div class="rui-page-preloader loader" role="status">
                  <div class="rui-page-preloader-inner">
                      <div></div>
                      <div></div>
                      <div></div>
                      <div></div>
                      <div></div>
                      <div></div>
                      <div></div>
                      <div></div>
                      <div></div>
                      <div></div>
                  </div>
              </div>
              <table id="example" class="table table-striped table-bordered " style="width:100%">
                <thead class="bg-gray-50">
                  <tr>
                  <th>#</th>
                    <th>Categoria</th>
                    <th>Titulo</th>
                    <th class="description">Descripción</th>
                    <th>Fecha</th>
                    <th>Acciones</th>
                  </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                  @foreach($tecnicasP as $tec)
                  <tr>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                      <div class="text-sm text-gray-900">{{$tec->id_tec}}</div>
                    </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                      <div class="text-sm text-gray-900">{{$tec->title}}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                      <div class="text-sm text-gray-900">{{$tec->title_tec}}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                      <div class="text-sm text-gray-900">{!! nl2br(e($tec->description_tec)) !!}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                      <div class="text-sm text-gray-900">{{$tec->creation_date}}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                      <a class="btn btn-edit" onclick="window.location='{{route('tecnicasP.edit', $tec->id_tec)}}'"><span stroke-width="1.5" data-feather="edit"></span></a>
                      <a class="btn btn-delete" onclick="deleteTecnicaP({{$tec->id_tec}})" href=""><span stroke-width="1.5" data-feather="delete"></span></a>
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