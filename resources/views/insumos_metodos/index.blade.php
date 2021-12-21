@extends('layouts.padre')
@section('contenido')

<head>
  <meta http-equiv="Cache-control" content="no-cache">
  <title>Listado De Insumos X Métodos</title>
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
    <div class="mt-5">
      <div class="flex flex-col">
          <h2>Listado De Insumos X Métodos</h2>
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
                    <th>Insumo</th>
                    <th>Indice De Encabezado</th>
                    <th>Indice De Método</th>
                    <th>Título Insumo/Producto</th>
                    <th>Acciones</th>
                  </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                  @foreach($insumo_metodo as $tec)
                  <tr >
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                      <div class="text-sm text-gray-900">{{$tec->id_ins_met}}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                      <div class="text-sm text-gray-900">{{$tec->title_ins}}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                      <div class="text-sm text-gray-900">@foreach($li as $l) @if($l->ins == $tec->first_cod) {{$l->title}} @endif @endforeach</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                      <div class="text-sm text-gray-900">{{$tec->ind_cod}}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                      <div class="text-sm text-gray-900">{{$tec->title}}</div>
                    </td>
                    @if ($tec->first_cod == NULL)
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                      <a class="btn btn-delete" onclick="deleteInsumoMetodo({{$tec->id_ins_met}})" href=""><span stroke-width="1.5" data-feather="delete"></span></a>
                    </td>
                    @else
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                      <p>Sin acciones</p>
                    </td>
                    @endif
                    
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