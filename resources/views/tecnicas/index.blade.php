@extends('layouts.padre')
@section('contenido')

<head>
  <meta http-equiv="Cache-control" content="no-cache">
  <title>Técnicas</title>
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
    <h2>Técnicas</h2>

    <a onclick="window.location='{{ url("tecnicas/create") }}'"><button class="btn btn-primary border border-gray-400 rounded ">Añadir tecnica</button></a>

    <div class="mt-5">
      <div class="flex flex-col">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
          <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
              <table id="example" class="table table-striped table-bordered " style="width:100%">
                <thead class="bg-gray-50">
                  <tr>
                    <th>#</th>
                    <th>Encabezado De Técnica</th>
                    <th>Título</th>
                    <th class="description">Descripción</th>
                    <th>Fecha</th>
                    <th>Gráfico</th>
                    <th>Usuario</th>
                    <th>Acciones</th>
                  </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                  @foreach($tecnicas as $tec)
                  <tr>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                      <div class="text-sm text-gray-900">{{$tec->id}}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                      <div class="text-sm text-gray-900">@foreach($li as $l) @if($l->tecnica_p == $tec->first_cod_tec){{$l->title_tec}} @endif @endforeach</div>
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
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                      <div class="text-sm text-gray-900">
                        @if($tec->image_tec == NULL)No tiene gráfico @else
                         <a target="_blank" href="{{ URL::to('/') }}/image/{{ $tec->image_tec }}"><img src="/image/{{ $tec->image_tec }}" width="100px"></a>
                         @endif
                      </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                      <div class="text-sm text-gray-900">{{$tec->id_user}}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                    <a class="btn btn-edit" onclick="window.location='{{ route('tecnicas.edit', $tec->id) }}'"><span stroke-width="1.5" data-feather="edit"></span></a>
                    <a class="btn btn-delete" onclick="deleteTecnica({{$tec->id}})" href=""><span stroke-width="1.5" data-feather="delete"></span></a>
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