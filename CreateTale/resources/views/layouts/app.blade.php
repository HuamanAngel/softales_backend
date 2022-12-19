<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" ></script>
    <script src="{{ asset('fortawesome/fontawesome-free/js/all.min.js') }}"></script>


    @yield('contenido_js')
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Pangolin&display=swap');
    </style>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/styleTemplate.css') }}" rel="stylesheet">
    <link href="{{ asset('fonts/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('fortawesome/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <style>
    .navbar {
        /* background: linear-gradient(0.25turn, rgba(31, 171, 31,0.9), rgba(38, 210, 38,0.9), rgba(31, 171, 31,0.9)) !important; */
        /* background-color: rgba(0, 0, 0, 0.7) !important;  */
        background: radial-gradient(circle at 50% -20.71%, #b7f4ff 0, #6c90d8 0%, #2c3750 100%);
        color: white !important;
    }
}

.bg-black {
    background-color: #000
}


    .active {
    background-color: rgba(195, 195, 195, 0.8);
    color: black !important
}


.nav-link {
    color: inherit !important
}

.nav-item {
    padding: 10px 20px;
    color: #fff
}

.nav-item:hover {
    background-color: #fff;
    color: #000 !important
}

.right {
    margin-left: auto
}

.navbar-collapse.collapse.in {
    display: block !important
}

@media (max-width: 992px) {
    .right {
        margin-left: 0
    }
}
    </style>
@yield('contenido_cSS')

</head> 
<body>

    @php
        $stringRuta = \Request::route()->getName();
    @endphp

    <div id="app">

        <nav class="navbar navbar-expand-lg fixed-top navbar-light bg-light"> <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="navbar-toggler-icon"></span> </button> <a class="navbar-brand" href="{{ url('/') }}">
            <img src="{{ asset('asset/logo-busvid19.png') }}" width="50px"  alt=""></a>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <div style="width:100%;font-size:30px;font-family: Pangolin" class="d-flex justify-content-center text-center">
                    Sistema de libros

                </div>
                <ul class="navbar-nav ml-md-auto">
                    @if (Route::has('login'))
                        <li style="font-weight: bold "class="nav-item @if($stringRuta == 'login') active @endif">
                            {{-- <a class="nav-link" href="{{ route('book.form.store') }}">{{ __('AGREGAR LIBRO') }}</a> --}}
                        </li>
                    @endif
                </ul>
            </div>

        </nav>

        <main class="py-4 ">
            <br>
            <br>
            @yield('content')
        </main>
    </div>
    @yield('contenido_abajo_js')

</body>
    
</html>
