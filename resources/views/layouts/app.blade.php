<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"  class="h-100">
<head>
    <meta charset="utf-8">
    <meta name="description" content="the test for Developer in PHP of Beitech">
    <meta name="author" content="Ing.Pedag. Henry Giovanny Gonzalez Waltero">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{asset('css/app.css')}}" rel="stylesheet">
    <link href="{{asset('css/font-awesome.css')}}" rel="stylesheet">
    <link href="{{asset('css/jquery.dataTables.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/spop.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/multi-select.dist.css')}}" rel="stylesheet">
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
    
    <!-- Propiedades globajes JS -->
    <script>
    window.laravel = {!! 
                    json_encode(['url'=>URL::to('/'),
                                'token'=>csrf_token()])    
                    !!};
    </script>
</head>
<body class="d-flex flex-column h-100">
    <header>
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand {{ Request::is('/') ? '' : 'brand-inactive' }}" href="{{ url('/') }}">
                    {{ config('app.name') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item {{ Request::is('customers') ? 'active' : '' }}"> 
                            <a class="nav-link" href="{{ route('listCustomer') }}"><i class="fas fa-list-ol"></i> {{ __('List Customer') }}</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main role="main" class="flex-shrink-0">
        <div class="container">
            @yield('content')    
        </div>            
    </main>

    <footer class="footer mt-auto py-3">
      <div class="container">
        <span class="text-muted">Created By <a class="link" href="https://giovannygonzalez.com/" target="_blank" >Ing.Pedag.Henry Giovanny Gonzalez Waltero</a> &copy; 2019</span>
      </div>
    </footer>

    <!-- Scripts -->
    <script src="{{asset('js/app.js')}}"></script>
    <script src="{{asset('js/bootbox.min.js')}}"></script>
    <script src="{{asset('js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('js/spop.min.js')}}"></script>
    <script src="{{asset('js/jquery.multi-select.js')}}"></script>
    <script src="{{asset('js/funciones.js')}}"></script>
</body>
</html>
