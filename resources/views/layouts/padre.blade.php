<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="RootUI - clean and powerful solution for your Dashboards, Administration areas.">
    <meta name="keywords" content="admin, dashboard, react, reactjs, html, jquery, clean">
    <meta name="author" content="nK">
    <link rel="icon" type="image/png" href="{{ asset('/images/favicon.png') }}">
    <link type="text/css" rel="stylesheet" href="https://cdn.datatables.net/1.11.0/css/dataTables.bootstrap4.min.css">
    <link type="text/css" rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap4.min.css">

    <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
    <link rel="stylesheet" href="{{ asset('/css/bootstrap-custom.css') }}">
    <link rel="stylesheet" href="{{ asset('/vendor/overlayscrollbars/css/OverlayScrollbars.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/yaybar.css') }}">
    <link rel="stylesheet" href="{{ asset('/vendor/fancybox/dist/jquery.fancybox.css') }}">
    <link rel="stylesheet" href="{{ asset('/vendor/emojionearea/dist/emojionearea.css') }}">
    <link rel="stylesheet" href="{{ asset('/vendor/swiper/swiper-bundle.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/vendor/chartist/dist/chartist.css') }}">
    <link rel="stylesheet" href="{{ asset('/vendor/jqvmap/dist/jqvmap.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/rootui.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/rootui-night.css') }}" media="(night)" class="rui-nightmode-link">
    <link rel="stylesheet" href="{{ asset('/css/custom.css') }}">


</head>
<style>
    h1,
    h2,
    h3,
    h4,
    h5,
    label,
    span,
    button {
        text-transform: capitalize;
    }
</style>

<body data-spy="scroll" data-target=".rui-page-sidebar" data-offset="140" class="caja rui-no-transition rui-navbar-autohide rui-section-lines">
    @include('sweetalert::alert')
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
    <div class="yaybar yay-hide-to-small yay-shrink yay-gestures rui-yaybar">
        <div class="yay-wrap-menu">
            <div class="yaybar-wrap">
                <ul>
                    <li class="yay-label">Comenzar</li>
                    <li class="yay-item-active"><a onclick="window.location='{{ url('/') }}'"><span class="yay-icon"><span data-feather="home" class="rui-icon rui-icon-stroke-1_5"></span></span>
                            <span>Clíente</span> <span class="rui-yaybar-circle"></span></a></li>
                    <li class="yay-item-active"><a onclick="window.location='{{ url('dashboard') }}'"><span class="yay-icon"><span data-feather="navigation" class="rui-icon rui-icon-stroke-1_5"></span></span>
                            <span>Principal Administrador</span> <span class="rui-yaybar-circle"></span></a></li>
                    <li class="yay-label">Categorías</li>
                    <li><a data-toggle="tooltip" data-placement="top" title="Listado y creación De Introducciones y logo principal" onclick="window.location='{{ url('principales') }}'"><span class="yay-icon"><span stroke-width="1.5" data-feather="layout"></span></span>
                            <span>Introducciones y Logo</span> <span class="rui-yaybar-circle"></span></a></li>
                    <li><a data-toggle="tooltip" data-placement="top" title="Listado y creaciónes De usuarios" onclick="window.location='{{ url('users') }}'"><span class="yay-icon"><span stroke-width="1.5" data-feather="users"></span></span> <span>Usuarios</span> <span class="rui-yaybar-circle"></span></a>
                    </li>
                    <li><a data-toggle="tooltip" data-placement="top" title="Listado y creaciónes De categorías" onclick="window.location='{{ url('categorias') }}'"><span class="yay-icon"><span stroke-width="1.5" data-feather="clipboard"></span></span> <span>Categoría</span>
                            <span class="rui-yaybar-circle"></span></a></li>
                    <li><a data-toggle="tooltip" data-placement="top" title="Listado y creaciones De metodos - titulo principal" onclick="window.location='{{ url('metodosP') }}'"><span class="yay-icon"><span stroke-width="1.5" data-feather="git-branch"></span></span> <span>Encabezado
                                Métodos</span> <span class="rui-yaybar-circle"></span></a></li>
                    <li><a data-toggle="tooltip" data-placement="top" title="Listado y creaciones de métodos" onclick="window.location='{{ url('metodos') }}'"><span class="yay-icon"><span stroke-width="1.5" data-feather="git-merge"></span></span> <span>Métodos</span>
                            <span class="rui-yaybar-circle"></span></a></li>
                    <li><a data-toggle="tooltip" data-placement="top" title="Listado y creaciones De productos e insumos" onclick="window.location='{{ url('productos') }}'"><span class="yay-icon"><span stroke-width="1.5" data-feather="codesandbox"></span></span>
                            <span>Insumos/Productos</span>
                            <span class="rui-yaybar-circle"></span></a></li>
                    <li><a data-toggle="tooltip" data-placement="top" title="Listado y creaciones De Técnicas - título principal" onclick="window.location='{{ url('tecnicasP') }}'"><span class="yay-icon"><span stroke-width="1.5" data-feather="trello"></span></span> <span>Encabezado
                                Técnicas</span> <span class="rui-yaybar-circle"></span></a></li>
                    <li><a data-toggle="tooltip" data-placement="top" title="Listado y creaciones De Técnicas" onclick="window.location='{{ url('tecnicas') }}'"><span class="yay-icon"><span stroke-width="1.5" data-feather="sidebar"></span></span> <span>Técnicas</span> <span class="rui-yaybar-circle"></span></a></li>

                    <li><a data-toggle="tooltip" data-placement="top" title="Listado De Productos E Insumos X Metodos" onclick="window.location='{{ url('insumos_metodos') }}'"><span class="yay-icon"><span stroke-width="1.5" data-feather="shuffle"></span></span><span>Insumos X Métodos</span> <span class="rui-yaybar-circle"></span></a></li>
                    <li><a data-toggle="tooltip" data-placement="top" title="Listado De Técnicas X Métodos" onclick="window.location='{{ url('tecnicas_metodos') }}'"><span class="yay-icon"><span stroke-width="1.5" data-feather="maximize-2"></span></span><span>Técnicas X Métodos</span> <span class="rui-yaybar-circle"></span></a></li>

                    <li class="yay-label">Opciones De Usuario</li>
                    <li><a data-toggle="tooltip" data-placement="top" title="Cambiar Contraseña" onclick="window.location='{{ route('users.passwordReset', \Auth::user()->id) }}'"><span class="yay-icon"><span stroke-width="1.5" data-feather="users"></span></span>
                            <span>Cambiar Contraseña</span>
                            <span class="rui-yaybar-circle"></span></a></li>
                    @guest
                    <li><a href="{{ route('login') }}" class="nav-link">Iniciar Sesión</a></li>
                    @else @if (Route::has('login')) @auth
                    <li class="ml-10">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <a class="text-white" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                        this.closest('form').submit();">
                                <span stroke-width="1.5" data-feather="log-out"></span><span class="ml-10">{{ __('Cerrar Sesión') }}</span>
                            </a>
                        </form>
                    </li>
                    @endauth
                    @endif @endguest
                </ul>
            </div>
        </div>
    </div>
    <div class="rui-yaybar-bg"></div>
    <nav class="rui-navbar rui-navbar-top rui-navbar-sticky border-0">
        <div class="rui-navbar-brand">
            <a href="/dashboard" class="rui-navbar-logo"><img src="{{ asset('images/logo-OLS-bl.png') }}" data-src-night="{{ asset('images/logo-OLS-bl.png') }}" data-src-day="{{ asset('images/logo-OLS-bl.png') }}" alt="" width="200"> </a><span style="margin-right: -100px; width:30px; position:relative;" class="yay-toggle rui-yaybar-toggle text-white" stroke-width="1.5" data-feather="align-justify"></span><span></span></button>
        </div>
        <div class="container-fluid">
            <div class="rui-navbar-content">
                <ul class="nav"></ul>
                <ul class="nav rui-navbar-right">

                    @guest
                    <li class="nav-item submenu login"><a class="" href="{{ route('login') }}">
                            Iniciar Sesión<i class="fas fa-user"></i></a>
                    </li>
                    @else @if (Route::has('login')) @auth
                    <li class="dropdown dropdown-hover dropdown-triangle dropdown-keep-open">
                        <a class="dropdown-item rui-navbar-avatar mnr-6" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ Auth::user()->name }}
                        </a>
                        <ul class="nav dropdown-menu">
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf

                                    <a style="font-size: 85%;" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                            this.closest('form').submit();">
                                        <span stroke-width="1.5" data-feather="log-out"></span>
                                        {{ __('Cerrar Sesión') }}
                                    </a>
                                </form>
                            </li>
                        </ul>
                    </li>
                    @else
                    <a href="{{ route('login') }}">Login</a> @endauth
                    @endif @endguest
                </ul>
            </div>
        </div>
    </nav>
    <div class="rui-navbar rui-navbar-mobile">
        <div class="rui-navbar-head"><button class="rui-yaybar-toggle rui-yaybar-toggle-inverse yay-toggle" type="button" aria-label="Toggle side navigation"><span style="margin-right: -20px;" class="yay-toggle rui-yaybar-toggle text-dark" stroke-width="1.5" data-feather="align-justify"></span></button>
            <a class="rui-navbar-logo" href="/dashboard"><img style="margin-left: 31%;" src="{{ asset('images/logo-OLS-bl.png') }}" data-src-night="{{ asset('images/logo-OLS-bl.png') }}" data-src-day="{{ asset('images/logo-OLS-bl.png') }}" alt="" width="180"></a>
            <div class="dropdown dropdown-triangle"><a class="dropdown-item rui-navbar-avatar" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="text-dark" stroke-width="" data-feather="user"></span></a>
                <ul class="dropdown-menu nav">
                    @guest
                    <li><a href="{{ route('login') }}" class="nav-link">Iniciar Sesión</a></li>
                    @else @if (Route::has('login')) @auth
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <a style="font-size: 85%;" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                <span stroke-width="1.5" data-feather="log-out"></span> {{ __('Cerrar Sesión') }}
                            </a>
                        </form>
                    </li>
                    @endauth
                    @endif @endguest
                </ul>
            </div>
        </div>

    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>

    <div class="rui-navbar-bg"></div>
    <div class="rui-page content-wrap">
        <div class="rui-page-content">
            <div class="container-fluid ">
                @yield('contenido')
            </div>
        </div>
        <footer class="rui-footer">
            <div class="container-fluid">
                <p class="mb-0">© Osvaldo Laurido &amp; Associates 2022</p>
            </div>
        </footer>
        <!--<footer class="rui-footer">
      <div class="container-fluid">
        <p class="mb-0">2020 &copy; Design by Dexad and nK.</p>
      </div>
    </footer>-->
    </div>
    <link href="{{ asset('/css/select2.min.css') }}" rel="stylesheet" />
    <script src="{{ asset('/js/select2.min.js') }}"></script>
    <script src="https://cdn.datatables.net/1.11.0/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.0/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap4.min.js"></script>

    <script src="{{ asset('/vendor/popper.js/dist/umd/popper.min.js') }}"></script>
    <script src="{{ asset('/vendor/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('/vendor/feather-icons/dist/feather.min.js') }}"></script>
    <script src="{{ asset('/vendor/overlayscrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
    <script src="{{ asset('/js/yaybar.js') }}"></script>
    <script src="{{ asset('/vendor/object-fit-images/dist/ofi.min.js') }}"></script>
    <script src="{{ asset('/vendor/fancybox/dist/jquery.fancybox.min.js') }}"></script>
    <script src="{{ asset('/vendor/moment/min/moment.min.js') }}"></script>
    <script src="{{ asset('/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('/vendor/chart.js/dist/Chart.min.js') }}"></script>
    <script src="{{ asset('/vendor/jqvmap/dist/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('/vendor/jqvmap/dist/maps/jquery.vmap.usa.js') }}"></script>

    <script src="{{ asset('/js/rootui.js') }}"></script>
    <script src="{{ asset('/js/rootui-init.js') }}"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('js/padre.js') }}"></script>

    <script>
        function deleteConfirmation(id) {
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
                },
                buttonsStyling: false
            })

            swalWithBootstrapButtons.fire({
                title: '¿Estás seguro?',
                text: "¡Esta acción no se puede revertir!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Si, Eliminar!',
                cancelButtonText: 'No, cancelar!',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                    Swal.fire({
                        title: "¡Exito!",
                        text: 'Dato eliminado',
                        type: "success",
                        timer: 3000,
                        showConfirmButton: false
                    })
                    $.ajax({
                        type: 'POST',
                        url: "{{ url('/users') }}/" + id,
                        data: {
                            "_token": "{{ csrf_token() }}"
                        },
                        dataType: 'JSON',
                        success: function(result) {

                        }
                    })
                    setTimeout(function() {
                        location.reload();
                    }, 2000);

                } else if (
                    /* Read more about handling dismissals below */
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons.fire(
                        'Cancelado',
                        'No hay problema :)',
                        'error'
                    )
                }
            })
        }
        //CATEGORIA 
        function deleteCategoria(id) {
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
                },
                buttonsStyling: false
            })

            swalWithBootstrapButtons.fire({
                title: '¿Estás seguro?',
                text: "¡Esta acción no se puede revertir!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Si, Eliminar!',
                cancelButtonText: 'No, cancelar!',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                    Swal.fire({
                        title: "¡Exito!",
                        text: 'Dato eliminado',
                        type: "success",
                        timer: 3000,
                        showConfirmButton: false
                    })
                    $.ajax({
                        type: 'POST',
                        url: "{{ url('/categorias') }}/" + id,
                        data: {
                            "_token": "{{ csrf_token() }}"
                        },
                        dataType: 'JSON',
                        success: function(result) {

                        }
                    })
                    setTimeout(function() {
                        location.reload();
                    }, 2000);

                } else if (
                    /* Read more about handling dismissals below */
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons.fire(
                        'Cancelado',
                        'No hay problema :)',
                        'error'
                    )
                }
            })
        }
        //TECNICAS 
        function deleteTecnica(id) {
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
                },
                buttonsStyling: false
            })

            swalWithBootstrapButtons.fire({
                title: '¿Estás seguro?',
                text: "¡Esta acción no se puede revertir!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Si, Eliminar!',
                cancelButtonText: 'No, cancelar!',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                    Swal.fire({
                        title: "¡Exito!",
                        text: 'Dato eliminado',
                        type: "success",
                        timer: 3000,
                        showConfirmButton: false
                    })
                    $.ajax({
                        type: 'POST',
                        url: "{{ url('/tecnicas') }}/" + id,
                        data: {
                            "_token": "{{ csrf_token() }}"
                        },
                        dataType: 'JSON',
                        success: function(result) {

                        }
                    })
                    setTimeout(function() {
                        location.reload();
                    }, 2000);

                } else if (
                    /* Read more about handling dismissals below */
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons.fire(
                        'Cancelado',
                        'No hay problema :)',
                        'error'
                    )
                }
            })
        }
        //TECNICAS PRINCIPALES
        function deleteTecnicaP(id) {
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
                },
                buttonsStyling: false
            })

            swalWithBootstrapButtons.fire({
                title: '¿Estás seguro?',
                text: "¡Esta acción no se puede revertir!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Si, Eliminar!',
                cancelButtonText: 'No, cancelar!',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                    Swal.fire({
                        title: "¡Exito!",
                        text: 'Dato eliminado',
                        type: "success",
                        timer: 3000,
                        showConfirmButton: false
                    })
                    $.ajax({
                        type: 'POST',
                        url: "{{ url('/tecnicasP') }}/" + id,
                        data: {
                            "_token": "{{ csrf_token() }}"
                        },
                        dataType: 'JSON',
                        success: function(result) {

                        }
                    })
                    setTimeout(function() {
                        location.reload();
                    }, 2000);

                } else if (
                    /* Read more about handling dismissals below */
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons.fire(
                        'Cancelado',
                        'No hay problema :)',
                        'error'
                    )
                }
            })
        }
        //METODOS PRINCIPALES
        function deleteMetodoP(id) {
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
                },
                buttonsStyling: false
            })

            swalWithBootstrapButtons.fire({
                title: '¿Estás seguro?',
                text: "¡Esta acción no se puede revertir!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Si, Eliminar!',
                cancelButtonText: 'No, cancelar!',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                    Swal.fire({
                        title: "¡Exito!",
                        text: 'Dato eliminado',
                        type: "success",
                        timer: 3000,
                        showConfirmButton: false
                    })
                    $.ajax({
                        type: 'POST',
                        url: "{{ url('/metodosP') }}/" + id,
                        data: {
                            "_token": "{{ csrf_token() }}"
                        },
                        dataType: 'JSON',
                        success: function(result) {

                        }
                    })
                    setTimeout(function() {
                        location.reload();
                    }, 2000);

                } else if (
                    /* Read more about handling dismissals below */
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons.fire(
                        'Cancelado',
                        'No hay problema :)',
                        'error'
                    )
                }
            })
        }
        //METODOS
        function deleteMetodo(id) {
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
                },
                buttonsStyling: false
            })

            swalWithBootstrapButtons.fire({
                title: '¿Estás seguro?',
                text: "¡Esta acción no se puede revertir!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Si, Eliminar!',
                cancelButtonText: 'No, cancelar!',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                    Swal.fire({
                        title: "¡Exito!",
                        text: 'Dato eliminado',
                        type: "success",
                        timer: 3000,
                        showConfirmButton: false
                    })
                    $.ajax({
                        type: 'POST',
                        url: "{{ url('/metodos') }}/" + id,
                        data: {
                            "_token": "{{ csrf_token() }}"
                        },
                        dataType: 'JSON',
                        success: function(result) {

                        }
                    })
                    setTimeout(function() {
                        location.reload();
                    }, 2000);

                } else if (
                    /* Read more about handling dismissals below */
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons.fire(
                        'Cancelado',
                        'No hay problema :)',
                        'error'
                    )
                }
            })
        }

        //PRINCIPALES
        function deletePrincipal(id) {
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
                },
                buttonsStyling: false
            })

            swalWithBootstrapButtons.fire({
                title: '¿Estás seguro?',
                text: "¡Esta acción no se puede revertir!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Si, Eliminar!',
                cancelButtonText: 'No, cancelar!',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                    Swal.fire({
                        title: "¡Exito!",
                        text: 'Dato eliminado',
                        type: "success",
                        timer: 3000,
                        showConfirmButton: false
                    })
                    $.ajax({
                        type: 'POST',
                        url: "{{ url('/principales') }}/" + id,
                        data: {
                            "_token": "{{ csrf_token() }}"
                        },
                        dataType: 'JSON',
                        success: function(result) {

                        }
                    })
                    setTimeout(function() {
                        location.reload();
                    }, 2000);

                } else if (
                    /* Read more about handling dismissals below */
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons.fire(
                        'Cancelado',
                        'No hay problema :)',
                        'error'
                    )
                }
            })
        }
        //PRINCIPALES
        function deleteProductos(id) {
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
                },
                buttonsStyling: false
            })

            swalWithBootstrapButtons.fire({
                title: '¿Estás seguro?',
                text: "¡Esta acción no se puede revertir!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Si, Eliminar!',
                cancelButtonText: 'No, cancelar!',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                    Swal.fire({
                        title: "¡Exito!",
                        text: 'Dato eliminado',
                        type: "success",
                        timer: 3000,
                        showConfirmButton: false
                    })
                    $.ajax({
                        type: 'POST',
                        url: "{{ url('/productos') }}/" + id,
                        data: {
                            "_token": "{{ csrf_token() }}"
                        },
                        dataType: 'JSON',
                        success: function(result) {

                        }
                    })
                    setTimeout(function() {
                        location.reload();
                    }, 2000);

                } else if (
                    /* Read more about handling dismissals below */
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons.fire(
                        'Cancelado',
                        'No hay problema :)',
                        'error'
                    )
                }
            })
        }
        //ELIMINAR IMAGEN TÉCNICA
        function imageDelete(id) {
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
                },
                buttonsStyling: false
            })

            swalWithBootstrapButtons.fire({
                title: '¿Estás seguro?',
                text: "¡Esta acción no se puede revertir!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Si, Eliminar!',
                cancelButtonText: 'No, cancelar!',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                    Swal.fire({
                        title: "¡Exito!",
                        text: 'Dato eliminado',
                        type: "success",
                        timer: 3000,
                        showConfirmButton: false
                    })
                    $.ajax({
                        type: 'POST',
                        url: "{{ url('/tecnicas-imageDelete') }}/" + id,
                        data: {
                            "_token": "{{ csrf_token() }}"
                        },
                        dataType: 'JSON',
                        success: function(result) {

                        }
                    })
                    setTimeout(function() {
                        location.reload();
                    }, 2000);

                } else if (
                    /* Read more about handling dismissals below */
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons.fire(
                        'Cancelado',
                        'No hay problema :)',
                        'error'
                    )
                }
            })
        }

        function submitForm(event) {
            event.preventDefault();
            window.history.back();
        }
        //ELIMINAR IMAGEN TÉCNICA
        function imageDeleteCategoria(id) {
            id.evenprevent
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
                },
                buttonsStyling: false
            })

            swalWithBootstrapButtons.fire({
                title: '¿Estás seguro?',
                text: "¡Esta acción no se puede revertir!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Si, Eliminar!',
                cancelButtonText: 'No, cancelar!',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                    Swal.fire({
                        title: "¡Exito!",
                        text: 'Dato eliminado',
                        type: "success",
                        timer: 3000,
                        showConfirmButton: false
                    })
                    $.ajax({
                        type: 'POST',
                        url: "{{ url('/categorias-imageDelete') }}/" + id,
                        data: {
                            "_token": "{{ csrf_token() }}"
                        },
                        dataType: 'JSON',
                        success: function(result) {

                        }
                    })
                    setTimeout(function() {
                        location.reload();
                    }, 2000);

                } else if (
                    /* Read more about handling dismissals below */
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons.fire(
                        'Cancelado',
                        'No hay problema :)',
                        'error'
                    )
                }
            })
        }

        function imageDeleteMetodo(id) {
            id.evenprevent
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
                },
                buttonsStyling: false
            })

            swalWithBootstrapButtons.fire({
                title: '¿Estás seguro?',
                text: "¡Esta acción no se puede revertir!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Si, Eliminar!',
                cancelButtonText: 'No, cancelar!',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                    Swal.fire({
                        title: "¡Exito!",
                        text: 'Dato eliminado',
                        type: "success",
                        timer: 3000,
                        showConfirmButton: false
                    })
                    $.ajax({
                        type: 'POST',
                        url: "{{ url('/metodos-imageDelete') }}/" + id,
                        data: {
                            "_token": "{{ csrf_token() }}"
                        },
                        dataType: 'JSON',
                        success: function(result) {

                        }
                    })
                    setTimeout(function() {
                        location.reload();
                    }, 2000);

                } else if (
                    /* Read more about handling dismissals below */
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons.fire(
                        'Cancelado',
                        'No hay problema :)',
                        'error'
                    )
                }
            })
        }

        function imageDeleteMetodoP(id) {
            id.evenprevent
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
                },
                buttonsStyling: false
            })

            swalWithBootstrapButtons.fire({
                title: '¿Estás seguro?',
                text: "¡Esta acción no se puede revertir!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Si, Eliminar!',
                cancelButtonText: 'No, cancelar!',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                    Swal.fire({
                        title: "¡Exito!",
                        text: 'Dato eliminado',
                        type: "success",
                        timer: 3000,
                        showConfirmButton: false
                    })
                    $.ajax({
                        type: 'POST',
                        url: "{{ url('/metodosP-imageDelete') }}/" + id,
                        data: {
                            "_token": "{{ csrf_token() }}"
                        },
                        dataType: 'JSON',
                        success: function(result) {

                        }
                    })
                    setTimeout(function() {
                        location.reload();
                    }, 2000);

                } else if (
                    /* Read more about handling dismissals below */
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons.fire(
                        'Cancelado',
                        'No hay problema :)',
                        'error'
                    )
                }
            })
        }

        function imageDeleteproducto(id) {
            id.evenprevent
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
                },
                buttonsStyling: false
            })

            swalWithBootstrapButtons.fire({
                title: '¿Estás seguro?',
                text: "¡Esta acción no se puede revertir!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Si, Eliminar!',
                cancelButtonText: 'No, cancelar!',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                    Swal.fire({
                        title: "¡Exito!",
                        text: 'Dato eliminado',
                        type: "success",
                        timer: 3000,
                        showConfirmButton: false
                    })
                    $.ajax({
                        type: 'POST',
                        url: "{{ url('/productos-imageDelete') }}/" + id,
                        data: {
                            "_token": "{{ csrf_token() }}"
                        },
                        dataType: 'JSON',
                        success: function(result) {

                        }
                    })
                    setTimeout(function() {
                        location.reload();
                    }, 2000);

                } else if (
                    /* Read more about handling dismissals below */
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons.fire(
                        'Cancelado',
                        'No hay problema :)',
                        'error'
                    )
                }
            })
        } 
    </script>

</body>