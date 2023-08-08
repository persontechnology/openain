<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>{{ config('app.name') }}</title>

      <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/pricing/">
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Borel&display=swap" rel="stylesheet">

    <style>
      html *{
          font-family: 'Borel', cursive;
      }
      body{
          font-family: 'Borel', cursive;
      }
  </style>

    

    <!-- Bootstrap core CSS -->
<link href="{{ asset('assets/dist/css/bootstrap.min.css') }}" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="{{ asset('css/pricing.css') }}" rel="stylesheet">

    <script src="{{ asset('assets/dist/js/bootstrap.bundle.min.js') }}"></script>
  </head>
  <body>
    
<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
  <symbol id="check" viewBox="0 0 16 16">
    <title>Check</title>
    <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"/>
  </symbol>
</svg>

<div class="container py-3">
  <header>
    <div class="d-flex flex-column flex-md-row align-items-center pb-3 mb-4 border-bottom">
      <a href="/" class="d-flex align-items-center text-dark text-decoration-none">
        
        <x-application-logo class="w-15 h-15 fill-current text-gray-500" width="40" height="32" />
        <span class="fs-4">{{ config('app.name') }}</span>
      </a>

      <nav class="d-inline-flex mt-2 mt-md-0 ms-md-auto">
        <a class="me-3 py-2 text-dark text-decoration-none" href="{{ route('dashboard') }}"><strong class="text-primary">Home</strong></a>
        <a class="me-3 py-2 text-dark text-decoration-none" href="{{ route('listado') }}"><strong class="text-success">Table</strong></a>
        <a  onclick="event.preventDefault(); document.getElementById('salir').submit();" class="me-3 py-2 text-dark text-decoration-none" href="route('logout')"><strong class="text-danger">Sign off</strong></a>
        <form method="POST" action="{{ route('logout') }}" id="salir">
          @csrf
      </form>
      </nav>
    </div>
  </header>

  <main>
    @yield('content')
  </main>

  <footer class="pt-4 my-md-5 pt-md-5 border-top">
    <div class="row">
      <div class="col-12 col-md">
        <x-application-logo class="w-15 h-15 fill-current text-gray-500" width="40" height="32" />
        <small class="d-block mb-3 text-muted">&copy; {{ date('Y') }}</small>
      </div>
    </div>
  </footer>
</div>


    
  </body>
</html>
