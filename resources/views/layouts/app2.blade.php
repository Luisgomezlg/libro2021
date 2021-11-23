<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="RootUI - clean and powerful solution for your Dashboards, Administration areas.">
    <meta name="keywords" content="admin, dashboard, template, react, reactjs, html, jquery, clean">
    <meta name="author" content="nK">
    <link rel="icon" type="image/png" href="{{asset('/images/favicon.png')}}">
    <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">

    <link rel="stylesheet" href="{{asset('/css/bootstrap-custom.css')}}">
    <link rel="stylesheet" href="{{asset('/css/yaybar.css')}}">
    <link rel="stylesheet" href="{{asset('/vendor/fancybox/dist/jquery.fancybox.css')}}">
    <link rel="stylesheet" href="{{asset('/vendor/emojionearea/dist/emojionearea.css')}}">
    <link rel="stylesheet" href="{{asset('/css/rootui.css')}}">
    <link rel="stylesheet" href="{{asset('/css/custom.css')}}">
</head>

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
                    <li class="yay-label">Principal</li>
                    <li class="yay-item-active"><a onclick="window.location='{{ url("/") }}'"><span class="yay-icon"><span data-feather="home" class="rui-icon rui-icon-stroke-1_5"></span></span>
                            <span>Introducción</span> <span class="rui-yaybar-circle"></span></a></li>
                    <li class="yay-label">Menu</li>
                    <li><a onclick="window.location='{{ url("categorias-list") }}'"><span class="yay-icon"><span stroke-width="1.5" data-feather="clipboard"></span></span> <span>Tecnicas</span> <span class="rui-yaybar-circle"></span></a></li>
                    <li><a onclick="window.location='{{ url("metodos-list") }}'"><span class="yay-icon"><span stroke-width="1.5" data-feather="clipboard"></span></span> <span>Metodos</span> <span class="rui-yaybar-circle"></span></a></li>
                    <li><a onclick="window.location='{{ url("productos-list") }}'"><span class="yay-icon"><span stroke-width="1.5" data-feather="clipboard"></span></span> <span>Insumos/Productos</span> <span class="rui-yaybar-circle"></span></a></li>

                    <!--<li><a onclick="window.location='{{ url("tecnicas-list") }}'"><span class="yay-icon"><span stroke-width="1.5" data-feather="clipboard"></span></span> <span>Tecnicas</span> <span class="rui-yaybar-circle"></span></a></li>
                    <li><a onclick="window.location='{{ url("productos-list") }}'"><span class="yay-icon"><span stroke-width="1.5" data-feather="clipboard"></span></span> <span>Productos</span> <span class="rui-yaybar-circle"></span></a></li>

                    <li><a href="calendar.html"><span class="yay-icon"><span data-feather="calendar" class="rui-icon rui-icon-stroke-1_5"></span></span> <span>Otras</span> <span class="rui-yaybar-circle"></span></a></li>
                    <li><a href="project-management.html"><span class="yay-icon"><span data-feather="book" class="rui-icon rui-icon-stroke-1_5"></span></span> <span>Otras</span>
                            <span class="rui-yaybar-circle"></span></a></li>
                    <li><a href="file-manager.html"><span class="yay-icon"><span data-feather="file" class="rui-icon rui-icon-stroke-1_5"></span></span> <span>Otras</span> <span class="rui-yaybar-circle"></span></a></li>
                    <li><a href="profile.html"><span class="yay-icon"><span data-feather="user" class="rui-icon rui-icon-stroke-1_5"></span></span> <span>Otras</span> <span class="rui-yaybar-circle"></span></a></li>
                    <li class="yay-label">Content</li>
                    <li><a href="grid.html"><span class="yay-icon"><span data-feather="grid" class="rui-icon rui-icon-stroke-1_5"></span></span> <span>Otras</span> <span class="rui-yaybar-circle"></span></a></li>
                    <li><a href="colors.html"><span class="yay-icon"><span data-feather="droplet" class="rui-icon rui-icon-stroke-1_5"></span></span> <span>Otras</span> <span class="rui-yaybar-circle"></span></a></li>
                    <li><a href="typography.html"><span class="yay-icon"><span data-feather="bold" class="rui-icon rui-icon-stroke-1_5"></span></span> <span>Otras</span> <span class="rui-yaybar-circle"></span></a></li>
                    <li><a href="element-tables.html"><span class="yay-icon"><span data-feather="menu" class="rui-icon rui-icon-stroke-1_5"></span></span> <span>Otras</span> <span class="rui-yaybar-circle"></span></a></li>
                    <li class="yay-label">Components</li>
                    <li class=""><a href="element-alerts.html" class="yay-sub-toggle"><span class="yay-icon"><span data-feather="layers" class="rui-icon rui-icon-stroke-1_5"></span></span>
                            <span>Base</span> <span class="rui-yaybar-circle"></span> <span class="yay-icon-collapse"><span data-feather="chevron-right" class="rui-icon rui-icon-collapse rui-icon-stroke-1_5"></span></span></a>
                        <ul class="yay-submenu dropdown-triangle">
                            <li><a href="element-alerts.html">Alerts</a></li>
                            <li><a href="element-badge.html">Badge</a></li>
                            <li><a href="element-breadcrumb.html">Breadcrumbs</a></li>
                            <li><a href="element-buttons.html">Buttons</a></li>
                            <li><a href="element-card.html">Card</a></li>
                            <li><a href="element-carousel.html">Carousel</a></li>
                            <li><a href="element-collapse.html">Collapse</a></li>
                            <li><a href="element-dropdowns.html">Dropdowns</a></li>
                            <li><a href="element-list-group.html">List group</a></li>
                            <li><a href="element-media-object.html">Media object</a></li>
                            <li><a href="element-modal.html">Modal</a></li>
                            <li><a href="element-navs.html">Navs</a></li>
                            <li><a href="element-pagination.html">Pagination</a></li>
                            <li><a href="element-popovers.html">Popovers</a></li>
                            <li><a href="element-progress.html">Progress</a></li>
                            <li><a href="element-spinners.html">Spinners</a></li>
                            <li><a href="element-tabs.html">Tabs</a></li>
                        </ul>
                    </li>-->
                    <li class="yay-label">Login</li>
                    @guest
                    <li><a onclick="window.location='{{ route('login') }}'"><span class="yay-icon"><span stroke-width="1.5" data-feather="user"></span></span> <span>Iniciar sesión</span> <span class="rui-yaybar-circle"></span></a></li>
                    <li><a onclick="window.location='{{ route('register') }}'"><span class="yay-icon"><span stroke-width="1.5" data-feather="lock"></span></span> <span>Registrarse</span> <span class="rui-yaybar-circle"></span></a></li>
                    @else @if (Route::has('login')) @auth
                    <li class=""><a href="" class="yay-sub-toggle"><span class="yay-icon"><span data-feather="log-out" class="rui-icon rui-icon-stroke-1_5"></span></span>
                            <span>{{ Auth::user()->name}}</span> <span class="rui-yaybar-circle"></span> <span class="yay-icon-collapse"><span data-feather="chevron-right" class="rui-icon rui-icon-collapse rui-icon-stroke-1_5"></span></span></a>
                    </li>
                    @else
                    <li class=""><a href="{{ route('login') }}" class="yay-sub-toggle"><span class="yay-icon"><span data-feather="log-in" class="rui-icon rui-icon-stroke-1_5"></span></span> <span>Inicia sesión<nav></nav></span> <span class="rui-yaybar-circle"></span> <span class="yay-icon-collapse"><span data-feather="chevron-right" class="rui-icon rui-icon-collapse rui-icon-stroke-1_5"></span></span></a>
                    </li>
                    @if (Route::has('register'))
                    <li class=""><a href="{{ route('register') }}" class="yay-sub-toggle"><span class="yay-icon"><span data-feather="log-out" class="rui-icon rui-icon-stroke-1_5"></span></span>
                            <span>Regístrate</span> <span class="rui-yaybar-circle"></span> <span class="yay-icon-collapse"><span data-feather="chevron-right" class="rui-icon rui-icon-collapse rui-icon-stroke-1_5"></span></span></a>
                    </li>
                    @endif @endauth

                    @endif @endguest

                </ul>
            </div>
        </div>
    </div>
    <div class="rui-yaybar-bg"></div>
    <nav class="rui-navbar rui-navbar-top rui-navbar-sticky border-0">
        <div class="rui-navbar-brand"><a href="/" class="rui-navbar-logo"><img src="https://033d1db.netsolhost.com/olsproyect/wp-content/uploads/2021/06/logo-OLS-bl.png" data-src-night="https://033d1db.netsolhost.com/olsproyect/wp-content/uploads/2021/06/logo-OLS-bl.png" data-src-day="https://033d1db.netsolhost.com/olsproyect/wp-content/uploads/2021/06/logo-OLS-bl.png" alt="" width="99"> </a><span style="margin-right: -100px; width:30px;" class="yay-toggle rui-yaybar-toggle text-white" stroke-width="1.5" data-feather="align-justify"></span><span></span></button></div>
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
                            {{ Auth::user()->name}}
                        </a>
                        <ul class="nav dropdown-menu">
                            <li><a href="profile.html" style="font-size: 85%;" class="nav-link">{{ Auth::user()->name}}</a></li>

                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf

                                    <a style="font-size: 85%;" href="{{ route('logout') }}" onclick="event.preventDefault();
                                    this.closest('form').submit();">
                                        {{ __('Cerrar Sesión') }}
                                    </a>
                                </form>
                            </li>
                        </ul>
                    </li>
                    @else
                    <a href="{{ route('login') }}">Login</a> @if (Route::has('register'))
                    <a href="{{ route('register') }}">Register</a> @endif @endauth

                    @endif @endguest

                    <!--<li class="dropdown dropdown-hover dropdown-triangle dropdown-keep-open"><a class="dropdown-item mnr-5" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-offset="0,12"><span class="btn btn-custom-round"><span data-feather="more-vertical" class="rui-icon rui-icon-stroke-1_5"></span></span></a>
                        <ul class="nav dropdown-menu">
                            <li>
                                <div class="custom-control custom-switch dropdown-item-switch"><input type="checkbox" class="custom-control-input rui-nightmode-toggle" id="toggleNightMode"> <label class="dropdown-item custom-control-label" for="toggleNightMode"><span data-feather="moon" class="rui-icon rui-icon-stroke-1_5"></span> <span>Night
                                            Mode</span> <span class="rui-dropdown-circle"></span></label></div>
                            </li>
                            <li>
                                <div class="custom-control custom-switch dropdown-item-switch"><input type="checkbox" class="custom-control-input rui-spotlightmode-toggle" id="toggleSpotlightMode">
                                    <label class="dropdown-item custom-control-label" for="toggleSpotlightMode"><span data-feather="square" class="rui-icon rui-icon-stroke-1_5"></span>
                                        <span>Spotlight Mode</span> <span class="rui-dropdown-circle"></span></label>
                                </div>
                            </li>
                            <li>
                                <div class="custom-control custom-switch dropdown-item-switch"><input type="checkbox" class="custom-control-input rui-sectionLines-toggle" id="toggleSectionLines">
                                    <label class="dropdown-item custom-control-label" for="toggleSectionLines"><span data-feather="layout" class="rui-icon rui-icon-stroke-1_5"></span>
                                        <span>Show section lines</span> <span class="rui-dropdown-circle"></span></label>
                                </div>
                            </li>
                            <li class="dropdown-menu-label">Sidebar</li>
                            <li>
                                <div class="custom-control custom-switch dropdown-item-switch"><input type="checkbox" class="custom-control-input rui-darkSidebar-toggle" id="toggleDarkSidebar">
                                    <label class="dropdown-item custom-control-label" for="toggleDarkSidebar"><span data-feather="sidebar" class="rui-icon rui-icon-stroke-1_5"></span>
                                        <span>Dark</span> <span class="rui-dropdown-circle"></span></label>
                                </div>
                            </li>
                            <li>
                                <div class="custom-control custom-switch dropdown-item-switch"><input type="checkbox" class="custom-control-input rui-staticSidebar-toggle" id="toggleStaticSidebar">
                                    <label class="dropdown-item custom-control-label" for="toggleStaticSidebar"><span data-feather="sidebar" class="rui-icon rui-icon-stroke-1_5"></span>
                                        <span>Static</span> <span class="rui-dropdown-circle"></span></label>
                                </div>
                            </li>
                            <li class="dropdown-menu-label">Navbar</li>
                            <li>
                                <div class="custom-control custom-switch dropdown-item-switch"><input type="checkbox" class="custom-control-input rui-darkNavbar-toggle" id="toggleDarkNavbar"> <label class="dropdown-item custom-control-label" for="toggleDarkNavbar"><span data-feather="menu" class="rui-icon rui-icon-stroke-1_5"></span>
                                        <span>Dark</span> <span class="rui-dropdown-circle"></span></label></div>
                            </li>
                        </ul>
                    </li>-->
                </ul>
            </div>
        </div>
    </nav>
    <div class="rui-navbar rui-navbar-mobile">
        <div class="rui-navbar-head"><button class="rui-yaybar-toggle rui-yaybar-toggle-inverse yay-toggle" type="button" aria-label="Toggle side navigation"><span></span></button> <a class="rui-navbar-logo mr-auto" href="dashboard.html"><img src="https://033d1db.netsolhost.com/olsproyect/wp-content/uploads/2021/06/logo-OLS-bl.png" data-src-night="https://033d1db.netsolhost.com/olsproyect/wp-content/uploads/2021/06/logo-OLS-bl.png" data-src-day="https://033d1db.netsolhost.com/olsproyect/wp-content/uploads/2021/06/logo-OLS-bl.png" alt="" width="95"></a>
            <div class="dropdown dropdown-triangle"><a class="dropdown-item rui-navbar-avatar" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="text-dark" stroke-width="1.5" data-feather="user"></span></a>
                <ul class="dropdown-menu nav">
                @guest
                <li><a href="{{ route('login') }}" class="nav-link">Iniciar sesión</a></li>
                @else @if (Route::has('login')) @auth
                <li><a href="profile.html" style="font-size: 85%;" class="nav-link">{{ Auth::user()->name}}</a></li>
                <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <a style="font-size: 85%;" href="{{ route('logout') }}" onclick="event.preventDefault();
                        this.closest('form').submit();">
                            {{ __('Cerrar Sesión') }}
                        </a>
                    </form>
                </li>
                @endauth @endif @endguest
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
        <footer class="rui-footer">
            <div class="container-fluid">
                <p class="mb-0">2021 &copy; Alta ingenieria.</p>
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
    <script src="{{asset('js/vista.js')}}"></script>

    <script src="{{asset('/vendor/jquery/dist/jquery.min.js')}}"></script>
    <script src="{{asset('/vendor/popper.js/dist/umd/popper.min.js')}}"></script>
    <script src="{{asset('/vendor/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('/vendor/feather-icons/dist/feather.min.js')}}"></script>
    <script src="{{asset('/js/yaybar.js')}}"></script>
    <script src="{{asset('/vendor/fancybox/dist/jquery.fancybox.min.js')}}"></script>
    <script src="{{asset('/js/rootui.js')}}"></script>
    <script src="{{asset('/js/rootui-init.js')}}"></script>

    <link rel="stylesheet" href="{{asset('/css/jquery-ui.css')}}">
    <script src="{{asset('/js/jquery-ui.js')}}"></script>
    <script>
        $(function() {
            $("#accordion").accordion({
                collapsible: true
            });
        });
        $(function() {
            $('[data-toggle="popover"]').popover()
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