@extends('layouts.app')
@section('content')


<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Vistas categorias</title>

</head>

<body>
  <style>
    .shadow {
      padding: 1.5rem;
    }

  </style>
   <a class="btn btn-primary text-white back mb-5" onclick="history.go(-1)">
        <span stroke-width="1.5" data-feather="arrow-left"></span> Regresar
    </a>
  <div class="container show3">
      <div class="border-t border-gray-200">
      <form action="{{ action('categoriaController@searchC')}}" method="get">
                    <label for="">
                        Buscar:
                        <input type="search" name="search" id="search" class="form-control form-control-sm" placeholder="Buscar técnica" aria-controls="example">
                    </label>
                </form>
        <dl class="cate-v">
          @foreach($show as $li)
          <a href="" onclick="window.location='{{ action('tecnicaController@show', $li->first_cod)}}'"><div class="categoria-v bg-white shadow overflow-hidden sm:rounded-lg mb-6">
            <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
              <dt class="text-sm font-medium text-gray-500">
              {{$li->title}}
              </dt>
            </div>
            </div></a>
            @endforeach
        </dl>
        {!! $show->links() !!}
    </div>
  </div>

</body>
<script>

</script>
<!-- JavaScript Bundle with Popper -->

@endsection