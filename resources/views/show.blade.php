@extends('layouts.app')
@section('content')


<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Vistas</title>

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
  <div class="container mt-5">
    <div class="bg-white shadow overflow-hidden sm:rounded-lg">
      <div class="px-4 py-5 sm:px-6">
        <!--<h3 class="text-lg leading-6 font-medium text-gray-900">
          Metodo
        </h3>-->
      </div>
      <div class="col-md-6">
                <div class="mb-4 d-flex justify-content-end">
                    <a class="btn btn-primary" href="{{ URL::to('/metodo/pdf') }}">Convertir a PDF</a>
                </div>
            </div>
      <div class="border-t border-gray-200">
        <dl>
          @php
          $bandera = 0;
          @endphp
          <div id="accordion">
            @foreach($show as $li)

            @if($li->insumo_id != NULL)
            @if($bandera == 0)
            <h3>{{$li->ind_cod}} - {{$li->title}}</h3>
            @php
            $bandera = 1;
            @endphp
            <div id="collapseOne" class="collapse border-0" aria-labelledby="headingOne" data-parent="#accordionExample">
              <p class="card-body">
                {{$li->description}}

                <button class="btn btn-outline-dark pop" data-container="body" data-toggle="popover" data-placement="top" title="{{$li->title_ins}}" data-content="{{$li->description_ins}}">
                  {{$li->title_ins}}
                </button>

              </p>
              @else
              <p class="card-body">
                {{$li->description}}

                <button class="btn btn-outline-dark pop" data-container="body" data-toggle="popover" data-placement="top" title="{{$li->title_ins}}" data-content="{{$li->description_ins}}">
                  {{$li->title_ins}}
                </button>

              </p>
              @endif
              @else
              @if($bandera == 1)
              @php
              $bandera = 0;
              @endphp
            </div>
            @endif
            <h3>{{$li->ind_cod}} - {{$li->title}}</h3>
            <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
              <p class="card-body">
                {{$li->description}}

              </p>
            </div>
            @endif


            @endforeach
          </div>

        </dl>
      </div>
    </div>
  </div>

</body>

@endsection