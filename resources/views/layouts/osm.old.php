<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta property="og:image" content="{{asset('img/')}}">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Nachtwinkeltje OSM | @yield('page')</title>

    <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/4f305c0b33.js" crossorigin="anonymous"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/nw.css') }}" rel="stylesheet">
    <link href="{{ asset('css/nw_dark.css') }}" rel="stylesheet">
</head>
  <body>
    <div id="app">
      <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm border-bottom">
        <div class="container">
          <a class="mt-4 mb-3" href="{{ route('employee-dashboard') }}" style="color: #000">Nachtwin OSM</a>
            <!-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button> -->
            <button class="navbar-toggler mt-3 mb-3" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
              <i class="fa fa-lg fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <!-- Left Side Of Navbar -->
              <ul class="navbar-nav mr-auto">

              </ul>
              <!-- Right Side Of Navbar -->
              <ul class="navbar-nav ml-auto">

              <li class="nav-item dropdown display-flex">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                  Personeel <span class="caret"></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="#">
                    {{ __('Gedragscode') }}
                  </a>
                  <!-- <a class="dropdown-item" href="#">
                    {{ __('Handboeken') }}
                  </a> -->
                  <a class="dropdown-item" href="#">
                    {{ __('Producten') }}
                  </a>
                  <a class="dropdown-item" href="#">
                    {{ __('Categorieën') }}
                  </a>
                  <a class="dropdown-item" href="#">
                    {{ __('Monitoring') }}
                  </a>
                </div>
              </li>
              <li class="nav-item dropdown display-flex">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                  Winkel <span class="caret"></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="#">
                    {{ __('Bestellingen') }}
                  </a>
                  <a class="dropdown-item" href="{{ route('osm-store-customers') }}">
                    {{ __('Klanten') }}
                  </a>
                  <a class="dropdown-item" href="{{ route('osm-store-products') }}">
                    {{ __('Producten') }}
                  </a>
                  <a class="dropdown-item" href="#">
                    {{ __('Categorieën') }}
                  </a>
                  <a class="dropdown-item" href="#">
                    {{ __('Monitoring') }}
                  </a>
                </div>
              </li>

                <li class="nav-item dropdown display-flex">
                  <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::guard('employee')->user()->fullName() }} <span class="caret"></span>
                  </a>
                  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{route('my-addresses')}}">
                      {{ __('Mijn instellingen') }}
                    </a>
                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                      {{ __('Afmelden') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      @csrf
                    </form>
                  </div>
                </li>
            </ul>
          </div>
        </div>
      </nav>
      <main class="py-4">
        @yield('content')
      </main>
    </div>
  </body>
</html>
