<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    {{-- <script src="js/my_code.js" defer></script> --}}
    <script>

    function drawSquare() {

        var elementOne = document.getElementsByName('placeForSquare')[0];
        var elementTwo = document.getElementsByClassName('createdBox')[0];
        var elementThree = document.getElementsByClassName('preview-product')[0];

        if (elementThree) {
            elementOne.removeChild(elementThree)
        } else if (elementTwo) {
            elementOne.removeChild(elementTwo)
        } else {
            //
        }

        var productColor = document.getElementsByName('color-picker')[0].value;
        var productHeight = document.getElementsByName('height-picker')[0].value;
        var productWidth = document.getElementsByName('width-picker')[0].value;
        var productHeightPx = productHeight + "px";
        var productWidthPx = productWidth + "px";

        var square = document.createElement('div');
        square.className = 'preview-product';
        square.style.backgroundColor = productColor;
        square.style.height = productHeightPx;
        square.style.width = productWidthPx;

        var newDiv = document.getElementsByName('placeForSquare')[0];
        newDiv.appendChild(square);

        var select_color = document.getElementById('color-picker-one');
        var insert_color = document.getElementById('color-picker-two');

        if(select_color.hasAttribute("disabled")) {
            select_color.removeAttribute("disabled");
        } else if (insert_color.hasAttribute("disabled")) {
            insert_color.removeAttribute("disabled");
        }
    }
    </script>
    <script>

    function disableForms() {

        var select_color = document.getElementById('color-picker-one');
        var insert_color = document.getElementById('color-picker-two');

        if (select_color.value == "red" || select_color.value == "yellow" || select_color.value == "blue") {
            //select_color.setAttribute("name", 'color-disabled');
            insert_color.disabled = true;
        } else if (insert_color.value !== null) {
            select_color.setAttribute("name", 'color-disabled');
            select_color.disabled = true;
        }
        else {
            //
        }

    }

    </script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
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
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
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
