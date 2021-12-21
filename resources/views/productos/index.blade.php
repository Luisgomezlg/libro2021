@extends('layouts.padre')
@section('contenido')

<head>
    <meta http-equiv="Cache-control" content="no-cache">
    <title>Insumos/Productos</title>
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
    <h2>Insumos/Productos</h2>

        <a onclick="window.location='{{ url("productos/create") }}'"><button class="btn btn-primary border border-gray-400 rounded ">Añadir Insumo/Producto</button></a>

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
                                        <th>Nombre</th>
                                        <th>Descripción</th>
                                        <th>Imagen</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach($insumos as $pro)
                                    <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            <div class="text-sm text-gray-900">{{$pro->id}}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            <div class="text-sm text-gray-900">{{$pro->title_ins}}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            <div class="text-sm text-gray-900">{{$pro->description_ins}}</div>
                                        </td>
                                        <td>
                                            <div class="text-sm text-gray-900">
                                                @if($pro->image == NULL)No tiene gráfico @else
                                                 <a target="_blank" href="{{ URL::to('/') }}/image/{{ $pro->image }}"><img src="/image/{{ $pro->image }}" width="100px"></a>
                                                 @endif
                                              </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            <a class="btn btn-edit" onclick="window.location='{{route('productos.edit', $pro->id)}}'"><span stroke-width="1.5" data-feather="edit"></span></a>
                                            <a class="btn btn-delete" onclick="deleteProductos({{$pro->id}})" href=""><span stroke-width="1.5" data-feather="delete"></span></a>
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