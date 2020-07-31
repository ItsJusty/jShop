<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta property="og:image" content="{{asset('img/')}}">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Geekr | @yield('page')</title>

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
    <link href="{{ asset('css/geekr.css') }}?time={{time()}}" rel="stylesheet">
    @if(session('dark_theme'))
      <link href="{{ asset('css/geekr-dark.css') }}?time={{time()}}" rel="stylesheet">
    @endif
</head>
<body>
  <div id="app">
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm border-bottom">
      <div class="container">
        <span>Klantenservice: {{ config('app.email') }}</span>
          <!-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
              <span class="navbar-toggler-icon"></span>
          </button> -->
          <div id="">
            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">

              @php
                $count = 0;
              @endphp

              @if (session('shopping_cart'))
                @foreach(session('shopping_cart') as $key => $value)
                  @php $count += $value['amount'] @endphp
                @endforeach
              @endif

              <li class="nav-item">
                <a href="{{ route('winkelmandje') }}" id="cart" class="nav-link d-none d-md-block">
                  @lang('shopping.shoppingcart') ({{$count}}) <span class="caret"></span>
                </a>
              </li>
            <!-- Authentication Links -->
            @guest
              <li class="nav-item">
                <a class="nav-link" href="{{ route('register') }}">{{ __('Mijn account') }}</a>
              </li>
              <!-- <li class="nav-item">
                <a class="nav-link" href="{{ route('register') }}">{{ __('Mijn account') }}</a>
              </li> -->
            @if (Route::has('register'))
              <!-- <li class="nav-item">
                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
              </li> -->
            @endif
            @else
              <li class="nav-item dropdown display-flex">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                  {{ Auth::user()->first_name . " " . Auth::user()->last_name }} <span class="caret"></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="{{route('my-addresses')}}">
                    {{ __('Mijn adressen') }}
                  </a>
                  <a class="dropdown-item" href="{{route('my-orders')}}">
                    {{ __('Mijn bestellingen') }}
                  </a>
                  <a class="dropdown-item" href="{{route('my-details')}}">
                    {{ __('Mijn instellingen') }}
                  </a>
                  <a class="dropdown-item" href="#">
                    {{ __('Mijn kortingsbonnen') }}
                  </a>
                  <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    {{ __('Afmelden') }}
                  </a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                  </form>
                </div>
              </li>
            @endguest
            <li class="nav-item d-none d-md-block">
              @if (session('dark_theme'))
                <form class="mt-2" action="{{ route('toggle-web-theme') }}" method="post">
                  @csrf
                  <button class="theme-toggler" href="{{ route('toggle-web-theme') }}" type="submit"><i class="fa fa-sun"></i></button>
                </form>
                @else
                <form class="mt-2" action="{{ route('toggle-web-theme') }}" method="post">
                  @csrf
                  <button class="theme-toggler" href="{{ route('toggle-web-theme') }}" type="submit"><i class="fa fa-moon"></i></button>
                </form>
              @endif
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
      <div class="container">
        <div class="row">
          <div class="col-10">
            <a class="navbar-brand mt-1" href="{{ url('/') }}">
              <!-- {{ config('app.name', 'Geekr') }} -->
              <img src="{{ asset('img/logo.png') }}" alt="Logo" class="logo-nav">
            </a>
          </div>
          <div class="col-1">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
              <!-- <span class="navbar-toggler-icon"></span> -->
              <i class="fa fa-lg fa-bars"></i>
            </button>
          </div>
        </div>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <!-- Left Side Of Navbar -->
          <ul class="navbar-nav text-left ml-3">
            <li class="nav-item">
              <a href="{{ route('winkelmandje') }}" id="cart" class="nav-link d-md-none">
                @lang('shopping.shoppingcart') ({{$count}}) <span class="caret"></span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Categorieën</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('customer-support')}}">Klantenservice</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Zakelijk</a>
            </li>
            <li class="nav-item d-md-none">
              @if (session('dark_theme'))
                <form action="{{ route('toggle-web-theme') }}" method="post">
                  @csrf
                  <button class="nav-link theme-toggler" href="{{ route('toggle-web-theme') }}" type="submit">White theme <i class="theme-toggler-icon fa fa-sun"></i></button>
                </form>
                @else
                <form action="{{ route('toggle-web-theme') }}" method="post">
                  @csrf
                 <button class="nav-link theme-toggler" href="{{ route('toggle-web-theme') }}" type="submit">Dark theme <i class="theme-toggler-icon fa fa-moon"></i></button>
                </form>
              @endif
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <main class="">
      @yield('content')
    </main>
    </div>
    <footer class="shadow">
      <div class="container ">
        <div class="row justify-content-center">
          <div class="col-lg-3 col-6">
            <h5>Informatie</h5><br/>
            <a class="footer-item" href="#">Algemene voorwaarden</a><br/>
            <a class="footer-item" href="#">Privacybeleid</a><br/>
            <a class="footer-item" href="#">Koekjes</a><br/>
            <a class="footer-item" href="#">Werken bij Geekr</a><br/>
            <a class="footer-item" href="#">Nieuws</a>
            <hr class="d-block d-sm-none d-md-none d-lg-none d-xl-none" />
          </div>
          <div class="col-lg-3 col-6">
            <h5>Klantenservice</h5><br/>
            <a class="footer-item" href="#">Support Tickets</a><br/>
            <a class="footer-item" href="#">Garantie</a><br/>
            <a class="footer-item" href="#">Retourbeleid</a><br/>
            <a class="footer-item" href="#">Contact</a><br/>
            <a class="footer-item" href="#">Klacht melden</a><br/>
            <hr class="d-block d-sm-none d-md-none d-lg-none d-xl-none" />
          </div>
          <div class="col-lg-3 col-6">
            <h5>Zakelijk</h5><br/>
            <a class="footer-item" href="#">Zakelijke klanten</a><br/>
            <a class="footer-item" href="#">Waardebonnen</a>
          </div>
          <div class="col-lg-3 col-6">
            <h5>Winkel informatie</h5><br/>
            Geekr<br/>
            Kingmastate 52<br/>
            8926NB Leeuwarden<br/>
            <a class="footer-item" href="https://www.kvk.nl/zoeken/?source=all&q=75491753&start=0&site=kvk2014" target="_blank">KVK: 75491753<br/>
            BTW: NL860301989B01
          </div>
        </div>
      </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/4f305c0b33.js" crossorigin="anonymous"></script>
  </body>
</html>
