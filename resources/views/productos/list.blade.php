@extends('layouts.app')
@section('content')

<head>
    <title>Insumos/Productos</title>
</head>

<body>
    <a class="btn btn-primary text-white back mb-5 rounded-circle" onclick="history.go(-1)">
        <span stroke-width="1.5" data-feather="arrow-left"></span>
    </a>
    <a class="btn btn-secundary back mb-5 rounded-circle" href="/productos-list">
        <span stroke-width="1.5" data-feather="home"></span>
    </a>
    <div class="mt-5 metodos">
        <div class="bg-white shadow overflow-hidden sm:rounded-lg mx-auto">
        <div class="px-4 py-5 sm:px-6">
                <h2 class="text-lg leading-6 font-medium text-primary font-weight-bold">
                    Insumos/Productos
                </h2>
            </div>
            <div class="border-t border-gray-200">
                <!--<form class="d-flex" action="" method="get">
                        <input type="search" name="search" id="search"  class="form-control form-control-sm" placeholder="Buscar producto" aria-controls="example">
                        <button class="btn btn-outline-primary btn-sm ml-5" type="submit"><span stroke-width="1.5" data-feather="search"></span></button>
                </form>-->
                <dl>
                    @if($list)
                    
                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6"style="width:50%">
                        <table id="example" class="table table-striped table-bordered " style="width:100%;">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th style="display: none;"></th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach($list as $li)
                                <tr>
                                    <td><a href="" style="font-weight: bold; font-size: 19px;" onclick="window.location='{{ action('productoController@show', $li->id)}}'">{{$li->title_ins}}</a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <!--<dt class="text-sm font-medium text-gray-500">
                            
                        </dt>-->
                    </div>
                    
                    @else
                        <p>No hay datos</p>
                    @endif
                </dl>
            </div>
        </div>
    </div>
</body>
@endsection