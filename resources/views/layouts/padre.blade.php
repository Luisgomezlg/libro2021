<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="RootUI - clean and powerful solution for your Dashboards, Administration areas.">
  <meta name="keywords" content="admin, dashboard, react, reactjs, html, jquery, clean">
  <meta name="author" content="nK">
  <link rel="icon" type="image/png" href="{{asset('/images/favicon.png')}}">
  <link type="text/css" rel="stylesheet" href="https://cdn.datatables.net/1.11.0/css/dataTables.bootstrap4.min.css">
  <link type="text/css" rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap4.min.css">

  <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
  <link rel="stylesheet" href="{{asset('/css/bootstrap-custom.css')}}">
  <link rel="stylesheet" href="{{asset('/vendor/overlayscrollbars/css/OverlayScrollbars.css')}}">
  <link rel="stylesheet" href="{{asset('/css/yaybar.css')}}">
  <link rel="stylesheet" href="{{asset('/vendor/fancybox/dist/jquery.fancybox.css')}}">
  <link rel="stylesheet" href="{{asset('/vendor/emojionearea/dist/emojionearea.css')}}">
  <link rel="stylesheet" href="{{asset('/vendor/swiper/swiper-bundle.min.css')}}">
  <link rel="stylesheet" href="{{asset('/vendor/chartist/dist/chartist.css')}}">
  <link rel="stylesheet" href="{{asset('/vendor/jqvmap/dist/jqvmap.css')}}">
  <link rel="stylesheet" href="{{asset('/css/rootui.css')}}">
  <link rel="stylesheet" href="{{asset('/css/rootui-night.css')}}" media="(night)" class="rui-nightmode-link">
  <link rel="stylesheet" href="{{asset('/css/custom.css')}}">


</head>

<body data-spy="scroll" data-target=".rui-page-sidebar" data-offset="140" class="caja rui-no-transition rui-navbar-autohide rui-section-lines">
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
          <li class="yay-item-active"><a onclick="window.location='{{ url("dashboard") }}'"><span class="yay-icon"><span data-feather="home" class="rui-icon rui-icon-stroke-1_5"></span></span>
              <span>Principal</span> <span class="rui-yaybar-circle"></span></a></li>
          <li class="yay-label">Categorias</li>
          <li><a onclick="window.location='{{ url("categorias") }}'"><span class="yay-icon"><span stroke-width="1.5" data-feather="clipboard"></span></span> <span>Categoria</span> <span class="rui-yaybar-circle"></span></a></li>
          <li><a onclick="window.location='{{ url("metodosP/create") }}'"><span class="yay-icon"><span stroke-width="1.5" data-feather="clipboard"></span></span> <span>Metodos principales</span> <span class="rui-yaybar-circle"></span></a></li>
          <li><a onclick="window.location='{{ url("metodos") }}'"><span class="yay-icon"><span stroke-width="1.5" data-feather="clipboard"></span></span> <span>Metodos</span> <span class="rui-yaybar-circle"></span></a></li>
          <li><a onclick="window.location='{{ url("tecnicasP/create") }}'"><span class="yay-icon"><span stroke-width="1.5" data-feather="clipboard"></span></span> <span>Tecnicas principales</span> <span class="rui-yaybar-circle"></span></a></li>
          <li><a onclick="window.location='{{ url("tecnicas") }}'"><span class="yay-icon"><span stroke-width="1.5" data-feather="clipboard"></span></span> <span>Tecnicas</span> <span class="rui-yaybar-circle"></span></a></li>
          <li><a onclick="window.location='{{ url("productos") }}'"><span class="yay-icon"><span stroke-width="1.5" data-feather="clipboard"></span></span> <span>Productos</span> <span class="rui-yaybar-circle"></span></a></li>
          <!--<li><a onclick="window.location='{{ url("det_metodos") }}'"><span class="yay-icon"><span stroke-width="1.5" data-feather="clipboard"></span></span> <span>Metodos x Tecnicas y productos</span> <span class="rui-yaybar-circle"></span></a></li>

          <li><a href="calendar.html"><span class="yay-icon"><span data-feather="calendar" class="rui-icon rui-icon-stroke-1_5"></span></span> <span>Calendar</span> <span class="rui-yaybar-circle"></span></a></li>
          <li><a href="project-management.html"><span class="yay-icon"><span data-feather="book" class="rui-icon rui-icon-stroke-1_5"></span></span> <span>Project Management</span>
              <span class="rui-yaybar-circle"></span></a></li>
          <li><a href="file-manager.html"><span class="yay-icon"><span data-feather="file" class="rui-icon rui-icon-stroke-1_5"></span></span> <span>File Manager</span> <span class="rui-yaybar-circle"></span></a></li>
          <li><a href="profile.html"><span class="yay-icon"><span data-feather="user" class="rui-icon rui-icon-stroke-1_5"></span></span> <span>Profile</span> <span class="rui-yaybar-circle"></span></a></li>
          <li class="yay-label">Content</li>
          <li><a href="grid.html"><span class="yay-icon"><span data-feather="grid" class="rui-icon rui-icon-stroke-1_5"></span></span> <span>Grid</span> <span class="rui-yaybar-circle"></span></a></li>
          <li><a href="colors.html"><span class="yay-icon"><span data-feather="droplet" class="rui-icon rui-icon-stroke-1_5"></span></span> <span>Colors</span> <span class="rui-yaybar-circle"></span></a></li>
          <li><a href="typography.html"><span class="yay-icon"><span data-feather="bold" class="rui-icon rui-icon-stroke-1_5"></span></span> <span>Typography</span> <span class="rui-yaybar-circle"></span></a></li>
          <li><a href="element-tables.html"><span class="yay-icon"><span data-feather="menu" class="rui-icon rui-icon-stroke-1_5"></span></span> <span>Tables</span> <span class="rui-yaybar-circle"></span></a></li>
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
          </li>
          <li class=""><a href="icons-feather.html" class="yay-sub-toggle"><span class="yay-icon"><span data-feather="box" class="rui-icon rui-icon-stroke-1_5"></span></span>
              <span>Advanced</span> <span class="rui-yaybar-circle"></span> <span class="yay-icon-collapse"><span data-feather="chevron-right" class="rui-icon rui-icon-collapse rui-icon-stroke-1_5"></span></span></a>
            <ul class="yay-submenu dropdown-triangle">
              <li class=""><a href="icons-feather.html" class="yay-sub-toggle">Icons <span class="yay-icon-collapse"><span data-feather="chevron-right" class="rui-icon rui-icon-collapse rui-icon-stroke-1_5"></span></span></a>
                <ul class="yay-submenu dropdown-triangle">
                  <li><a href="icons-feather.html">Feather</a></li>
                  <li><a href="icons-fontawesome.html">Font Awesome</a></li>
                </ul>
              </li>
              <li class=""><a href="chart-js.html" class="yay-sub-toggle">Charts <span class="yay-icon-collapse"><span data-feather="chevron-right" class="rui-icon rui-icon-collapse rui-icon-stroke-1_5"></span></span></a>
                <ul class="yay-submenu dropdown-triangle">
                  <li><a href="chart-js.html">Chart.js</a></li>
                  <li><a href="chart-chartist.html">Chartist</a></li>
                  <li><a href="chart-peity.html">Peity</a></li>
                  <li><a href="chart-echarts.html">eCharts</a></li>
                  <li><a href="chart-flot.html">Flot</a></li>
                </ul>
              </li>
              <li><a href="element-timeline.html">Timeline</a></li>
              <li><a href="element-tree-view.html">Tree View</a></li>
              <li><a href="element-toasts.html">Toasts</a></li>
              <li><a href="element-sweetalert.html">Sweet Alert</a></li>
              <li><a href="element-maps.html">Maps</a></li>
              <li><a href="element-datatables.html">Data Tables</a></li>
            </ul>
          </li>
          <li class="yay-label">Forms</li>
          <li><a href="element-forms.html"><span class="yay-icon"><span data-feather="mail" class="rui-icon rui-icon-stroke-1_5"></span></span> <span>Base</span> <span class="rui-yaybar-circle"></span></a></li>
          <li class=""><a href="element-datetime.html" class="yay-sub-toggle"><span class="yay-icon"><span data-feather="database" class="rui-icon rui-icon-stroke-1_5"></span></span>
              <span>Advanced</span> <span class="rui-yaybar-circle"></span> <span class="yay-icon-collapse"><span data-feather="chevron-right" class="rui-icon rui-icon-collapse rui-icon-stroke-1_5"></span></span></a>
            <ul class="yay-submenu dropdown-triangle">
              <li><a href="element-datetime.html">DateTime Picker</a></li>
              <li><a href="element-daterange.html">DateRange Picker</a></li>
              <li><a href="element-validation.html">Validation</a></li>
              <li><a href="element-touchspin.html">Touchspin</a></li>
              <li><a href="element-rangeslider.html">Range Slider</a></li>
              <li><a href="element-inputmasks.html">Input Masks</a></li>
              <li><a href="element-dropzone.html">Dropzone</a></li>
              <li><a href="element-colorpicker.html">Color Picker</a></li>
              <li><a href="element-selectize.html">Selectize</a></li>
              <li><a href="element-markdown.html">Markdown editor</a></li>
              <li><a href="element-WYSIWYG.html">WYSIWYG editor</a></li>
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
  <nav class="rui-navbar rui-navbar-top rui-navbar-sticky">
  <div class="rui-navbar-brand"><a href="/dashboard" class="rui-navbar-logo"><img src="https://033d1db.netsolhost.com/olsproyect/wp-content/uploads/2021/06/logo-OLS-bl.png" data-src-night="https://033d1db.netsolhost.com/olsproyect/wp-content/uploads/2021/06/logo-OLS-bl.png" data-src-day="https://033d1db.netsolhost.com/olsproyect/wp-content/uploads/2021/06/logo-OLS-bl.png" alt="" width="99"> </a><span style="margin-right: -100px; width:30px;" class="yay-toggle rui-yaybar-toggle text-white" stroke-width="1.5" data-feather="align-justify"></span><span></span></button></div>
    <div class="container-fluid">
      <div class="rui-navbar-content">
        <ul class="nav"></ul>
        <ul class="nav rui-navbar-right">

          @guest
          <li class="nav-item submenu login"><a class="" href="{{ route('login') }}">
              Iniciar sesión<i class="fas fa-user"></i></a>
          </li>
          @else @if (Route::has('login')) @auth
          <li class="dropdown dropdown-hover dropdown-triangle dropdown-keep-open">
            <a class="dropdown-item rui-navbar-avatar mnr-6" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            {{ Auth::user()->name}}
            </a>
            <ul class="nav dropdown-menu">
              <li><a href="profile.html" style="font-size: 85%;" class="nav-link">{{ \Illuminate\Support\Str::limit(Auth::user()->name)}}</a></li>

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
        @yield('contenido')
      </div>
    </div>
    <!--<footer class="rui-footer">
      <div class="container-fluid">
        <p class="mb-0">2020 &copy; Design by Dexad and nK.</p>
      </div>
    </footer>-->
  </div>
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="{{asset('js/padre.js')}}"></script>
  <script src="https://cdn.datatables.net/1.11.0/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.11.0/js/dataTables.bootstrap4.min.js"></script>
  <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
  <script src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap4.min.js"></script>

  <script src="{{asset('/vendor/popper.js/dist/umd/popper.min.js')}}"></script>
  <script src="{{asset('/vendor/bootstrap/dist/js/bootstrap.min.js')}}"></script>
  <script src="{{asset('/vendor/feather-icons/dist/feather.min.js')}}"></script>
  <script src="{{asset('/vendor/overlayscrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
  <script src="{{asset('/js/yaybar.js')}}"></script>
  <script src="{{asset('/vendor/object-fit-images/dist/ofi.min.js')}}"></script>
  <script src="{{asset('/vendor/fancybox/dist/jquery.fancybox.min.js')}}"></script>
  <script src="{{asset('/vendor/moment/min/moment.min.js')}}"></script>
  <script src="{{asset('/vendor/swiper/swiper-bundle.min.js')}}"></script>
  <script src="{{asset('/vendor/chart.js/dist/Chart.min.js')}}"></script>
  <script src="{{asset('/vendor/jqvmap/dist/jquery.vmap.min.js')}}"></script>
  <script src="{{asset('/vendor/jqvmap/dist/maps/jquery.vmap.usa.js')}}"></script>

  <script src="{{asset('/js/rootui.js')}}"></script>
  <script src="{{asset('/js/rootui-init.js')}}"></script>

  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>



  <script>
    
    
    $('.livesearch').select2({
      placeholder: 'Selecciona el insumo',
      ajax: {
        url: '/ajax-search',
        dataType: 'json',
        delay: 250,
        processResults: function(data) {
          return {
            results: $.map(data, function(item) {
              return {
                text: item.title_ins,
                id: item.title,
                value: item.title
              }
            })
          };
        },
        cache: true
      }
    });
    $('.insumo').select2({
      placeholder: 'Selecciona el insumo',
      ajax: {
        url: '/ajax-insumo',
        dataType: 'json',
        delay: 250,
        processResults: function(data) {
          return {
            results: $.map(data, function(item) {
              return {
                text: item.title_ins,
                id: item.id,
                value: item.id
              }
            })
          };
        },
        cache: true
      }
    });
    $('.tecnica').select2({
      placeholder: 'Selecciona el insumo',
      ajax: {
        url: '/ajax-tecnica',
        dataType: 'json',
        delay: 250,
        processResults: function(data) {
          return {
            results: $.map(data, function(item) {
              return {
                text: item.title,
                id: item.id,
                value: item.id
              }
            })
          };
        },
        cache: true
      }
    });
    $(function() {
      $(document).on('change', '.livesearch', function() {
        var value = $(this).val();
        $('#title_det').val(value);
        console.log(value);
      });

    });
  </script>

</body>