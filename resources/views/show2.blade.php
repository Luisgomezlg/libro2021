@extends('layouts.app')
@section('content')
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Insumos/Productos</title>
</head>
<body>
  <style>
    .shadow {
      padding: 1.5rem;
    }
  </style>
   <a class="btn btn-primary text-white back mb-5 rounded-circle" onclick="history.go(-1)">
        <span stroke-width="1.5" data-feather="arrow-left"></span>
    </a>
  <div class="container mt-5">

    <div class="bg-white shadow overflow-hidden sm:rounded-lg">
      <div class="px-4 py-5 sm:px-6">
        <!--<h3 class="text-lg leading-6 font-medium text-gray-900">
          Metodo
        </h3>-->
      </div>
      <div class="border-t border-gray-200">
        <dl>
          @foreach($show as $li)
            <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
              <dt class="text-sm font-medium text-gray-500">
                {{$li->title_ins}}
              </dt>
              <p class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                {{$li->description_ins}}
              </p>
              @if($li->image == '')

              @else
              <div class="text-center text-sm text-gray-900"><img src="/image/{{ $li->image }}" style="width: 50%"></div>
              @endif
            </div>
            @endforeach
        </dl>
      </div>
    </div>
  </div>
</body>
<script>
</script>
@endsection