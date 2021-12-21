@extends('layouts.padre')
@section('contenido')

<head>
  <meta http-equiv="Cache-control" content="no-cache">
  <title>Usuarios</title>
</head>

<body>
  <style>
    input[type="radio"],
    input[type="checkbox"] {
      -webkit-box-sizing: border-box;
      box-sizing: border-box;
      padding: 0;
      width: calc(1.8rem + 8px);
      height: calc(1rem + 0.5px);
    }
  </style>

  <div class="metodos">
    <!-- This example requires Tailwind CSS v2.0+ -->
    <h2>Usuarios</h2>
    <a onclick="window.location='{{ url('users/create') }}'"><button class="btn btn-primary border border-gray-400 rounded ">Añadir usuario</button></a>

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
              <table id="exampleUsuario" class="table table-striped table-bordered " style="width:100%">
                <thead class="bg-gray-50">
                  <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Correo electrónico</th>
                    <th>Rol</th>
                    <th>Numero De Compañía</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                  </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">

                  @foreach ($users as $usr)
                  <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                      <div class="text-sm text-gray-900">{{ $usr->id }}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                      <div class="text-sm text-gray-900">{{ $usr->name }}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                      <div class="text-sm text-gray-900">{{ $usr->lastName }}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                      <div class="text-sm text-gray-900">{{ $usr->email }}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                      <div class="text-sm text-gray-900">{{ $usr->id_rol }}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                      <div class="text-sm text-gray-900">{{ $usr->number_company }}</div>
                    </td>
                    @if ($usr->state == 60)
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                      <div class="text-sm text-gray-900">Activo</div>
                    </td>
                    @else
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                      <div class="text-sm text-gray-900">Inactivo</div>
                    </td>
                    @endif
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                      <div class="text-center">
                        <a class="btn btn-edit" href="" onclick="window.location='{{ route('users.edit', $usr->id) }}'"><span stroke-width="1.5" data-feather="edit"></span></a>
                        <a class="btn btn-delete" onclick="deleteConfirmation({{ $usr->id }})" href=""><span stroke-width="1.5" data-feather="delete"></span></a>
                        <!--<a class="btn btn-delete" href=""><span stroke-width="1.5" data-feather="delete"></span></a>-->
                        <input data-id="{{ $usr->id }}" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Activo" data-off="Inactivo" {{ $usr->state ? 'checked' : '' }}>
                      </div>
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