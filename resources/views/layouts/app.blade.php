<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="RootUI - clean and powerful solution for your Dashboards, Administration areas.">
    <meta name="keywords" content="admin, dashboard, template, react, reactjs, html, jquery, clean">
    <meta name="author" content="nK">
    <link rel="icon" type="image/png" href="{{ asset('/images/favicon.png') }}">
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
    h1, h2, h3, h4, h5, label, span, button{
        text-transform: capitalize;
    }
</style>
<body data-spy="scroll" data-target=".rui-page-sidebar" data-offset="140" class="rui-no-transition rui-navbar-autohide rui-section-lines">
    <div class="loader"></div>
    <div class="rui-page-preloader" role="status">
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
                    <li class="yay-label">Início</li>
                    @if (\Auth::User()->id_rol == 1)
                    <li class=""><a onclick="window.location='{{ url('/dashboard') }}'"><span class="yay-icon"><span data-feather="package" class="rui-icon rui-icon-stroke-1_5"></span></span>
                            <span>Administrador</span> <span class="rui-yaybar-circle"></span></a></li>
                    @endif
                    <li class=""><a onclick="window.location='{{ url('/') }}'"><span class="yay-icon"><span data-feather="navigation" class="rui-icon rui-icon-stroke-1_5"></span></span>
                            <span>Introducción</span> <span class="rui-yaybar-circle"></span></a></li>
                    <li class="yay-label">Menú</li>
                    <li><a data-toggle="tooltip" data-placement="top" title="Metodos" onclick="window.location='{{ url('metodos-list') }}'"><span class="yay-icon"><span stroke-width="1.5" data-feather="git-branch"></span></span> <span>Métodos</span>
                            <span class="rui-yaybar-circle"></span></a></li>
                    <li><a data-toggle="tooltip" data-placement="top" title="Insumos/Productos" onclick="window.location='{{ url('productos-list') }}'"><span class="yay-icon"><span stroke-width="1.5" data-feather="shuffle"></span></span>
                            <span>Insumos/Productos</span> <span class="rui-yaybar-circle"></span></a></li>
                    <li><a data-toggle="tooltip" data-placement="top" title="Técnicas" onclick="window.location='{{ url('categorias-list') }}'"><span class="yay-icon"><span stroke-width="1.5" data-feather="sidebar"></span></span>
                            <span>Técnicas</span> <span class="rui-yaybar-circle"></span></a></li>
                    <!--<li><a onclick="window.location='{{ url('tecnicas-list') }}'"><span class="yay-icon"><span stroke-width="1.5" data-feather="clipboard"></span></span> <span>Tecnicas</span> <span class="rui-yaybar-circle"></span></a></li>-->
                    <li class="yay-label">Opciones De Usuario</li>
                    <li><a data-toggle="tooltip" data-placement="top" title="Cambiar Contraseña" onclick="window.location='{{ route('users.passwordReset', \Auth::user()->id) }}'"><span class="yay-icon"><span stroke-width="1.5" data-feather="users"></span></span>
                            <span>Cambiar Contraseña</span>
                            <span class="rui-yaybar-circle"></span></a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="rui-yaybar-bg"></div>
    <nav class="rui-navbar rui-navbar-top rui-navbar-sticky border-0">
        <div class="rui-navbar-brand">
            <a href="/" class="rui-navbar-logo"><img src="{{ asset('images/logo-OLS-bl.png') }}" data-src-night="{{ asset('images/logo-OLS-bl.png') }}" data-src-day="{{ asset('images/logo-OLS-bl.png') }}" alt="" width="200"> </a><span style="margin-right: -100px; width:30px; position:relative;" class="yay-toggle rui-yaybar-toggle text-white" stroke-width="1.5" data-feather="align-justify"></span><span></span></button>
        </div>
        <div class="container-fluid">
            <div class="rui-navbar-content">
                <ul class="nav"></ul>
                <ul class="nav rui-navbar-right">

                    @guest
                    <li class="nav-item submenu login"><a class="text-white" href="{{ route('login') }}">
                            Iniciar sesión<i class="fas fa-user"></i></a>
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
                    <a href="{{ route('login') }}">Login</a>@endauth
                    @endif @endguest
                </ul>
            </div>
        </div>
    </nav>
    <div class="rui-navbar rui-navbar-mobile">
        <div class="rui-navbar-head"><button class="rui-yaybar-toggle rui-yaybar-toggle-inverse yay-toggle" type="button" aria-label="Toggle side navigation"><span style="margin-right: -20px;" class="yay-toggle rui-yaybar-toggle text-dark" stroke-width="1.5" data-feather="align-justify"></span></button>
            <a class="rui-navbar-logo" href="/"><img style="margin-left: 31%;" src="{{ asset('images/logo-OLS-bl.png') }}" data-src-night="{{ asset('images/logo-OLS-bl.png') }}" data-src-day="{{ asset('images/logo-OLS-bl.png') }}" alt="" width="180"></a>
            <div class="dropdown dropdown-triangle"><a class="dropdown-item rui-navbar-avatar" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="text-dark" stroke-width="1.5" data-feather="user"></span></a>
                <ul class="dropdown-menu nav">
                    @guest
                    <li><a href="{{ route('login') }}" class="nav-link">Iniciar sesión</a></li>
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
    <div class="rui-navbar-bg"></div>
    <div class="rui-page content-wrap">
        <div class="rui-page-content">
            <div class="container-fluid ">
                @yield('content')
            </div>
        </div>
        <footer class="rui-footer" style="position: relative; margin-top: 5em; z-index: 1;">
            <div class="container-fluid">
                <p class="mb-0">© Osvaldo Laurido &amp; Associates 2022</p>
            </div>
        </footer>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script>
        $(document).ready(function() {
            $("h3").click(function() {
                $(".ui-state-active").addClass("header-accordion")
            })
        });
    </script>
    <script src="{{ asset('js/vista.js') }}"></script>

    <script src="{{ asset('/vendor/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('/vendor/popper.js/dist/umd/popper.min.js') }}"></script>
    <script src="{{ asset('/vendor/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('/vendor/feather-icons/dist/feather.min.js') }}"></script>
    <script src="{{ asset('/vendor/overlayscrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
    <script src="{{ asset('/js/yaybar.js') }}"></script>
    <script src="{{ asset('/vendor/object-fit-images/dist/ofi.min.js') }}"></script>
    <script src="{{ asset('/vendor/fancybox/dist/jquery.fancybox.min.js') }}"></script>
    <script src="{{ asset('/vendor/emojione/lib/js/emojione.min.js') }}"></script>
    <script src="{{ asset('/vendor/emojionearea/dist/emojionearea.min.js') }}"></script>
    <script src="{{ asset('/vendor/moment/min/moment.min.js') }}"></script>
    <script src="{{ asset('/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('/vendor/chart.js/dist/Chart.min.js') }}"></script>
    <script src="{{ asset('/vendor/chartist/dist/chartist.min.js') }}"></script>
    <script src="{{ asset('/vendor/jqvmap/dist/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('/vendor/jqvmap/dist/maps/jquery.vmap.usa.js') }}"></script>

    <script src="{{ asset('/js/rootui.js') }}"></script>
    <script src="{{ asset('/js/rootui-init.js') }}"></script>


    <link rel="stylesheet" href="{{ asset('/css/jquery-ui.css') }}">
    <script src="{{ asset('/js/jquery-ui.js') }}"></script>
    <script>
        $(function() {
            $("#accordion").accordion({
                collapsible: true,
                fillSpace: false,
                autoHeight: true
            });
            //$("#collapseOne").hide();
            $(".ui-accordion-content").css("height", "20%");

        });

        $(function() {
            $('.popover-dismiss').popover({
                trigger: 'focus'
            })
        })

        var modal = document.getElementById("exampleModal");
        // Get the button that opens the modal
        var btn = document.getElementById("myBtn");
        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];
        var elemento = document.querySelector(".content-wrap");
        // When the user clicks the button, open the modal 
        btn.onclick = function() {

            modal.style.display = "block";
        }
        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modal.style.display = "none";
        }
        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>
</body>