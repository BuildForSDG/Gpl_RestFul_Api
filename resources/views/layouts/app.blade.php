<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <title>{{ config("app.name", "Laravel") }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" />

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" />

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('img/favicon.png') }}" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" />
    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="{{ asset('css/fontawesome-all.min.css') }}" />
    <!-- Flaticon CSS -->
    <link rel="stylesheet" href="{{ asset('font/flaticon.css') }}" />
    <!-- Google Web Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&amp;display=swap" rel="stylesheet" />
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('style.css') }}" />
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config("app.name", "GPL API") }}
                    </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto"></ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __("Login") }}</a
                                >
                            </li>

                            <li class="nav-item">
                                <a
                                    class="nav-link"
                                    href="{{ route('register') }}"
                                    >{{ __("Register") }}</a
                                >
                            </li>

                            @else

                               <a class="nav-link" href="{{ route('login') }}"> {{ Auth::user()->name }}</a
                                >
                            </li>

                            <li class="nav-item">
                                <a
                                    class="nav-link"
                                    href="{{ route('signout') }}"
                                    > {{ __("Logout") }}</a
                                >

                                   <form id="logout-form" action="{{ route('signout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>

                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">@yield('content')</main>
    </div>
    <!-- jquery-->
    <script src="{{ asset('js/jquery-3.5.0.min.js') }}"></script>
    <!-- Popper js -->
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <!-- Bootstrap js -->
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <!-- Imagesloaded js -->
    <script src="{{ asset('js/imagesloaded.pkgd.min.js') }}"></script>
    <!-- Validator js -->
    <script src="{{ asset('js/validator.min.js') }}"></script>
    <!-- Custom Js -->
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js" integrity="sha512-bZS47S7sPOxkjU/4Bt0zrhEtWx0y0CRkhEp8IckzK+ltifIIE9EMIMTuT/mEzoIMewUINruDBIR/jJnbguonqQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>

</html>
