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

    function addAttribute() {

        // Attribute NAME input creator
        var attr_name_place = document.getElementsByName('placeForAttrName')[0];
        var attr_name_input = document.createElement('div');
        attr_name_input.className = 'form-group';
        attr_name_place.appendChild(attr_name_input);
        var x = document.createElement('input');
        x.type = 'text';
        x.className = 'form-control';
        x.name = 'attributename[]'; // add + 1
        x.placeholder = 'Attribute name';
        attr_name_input.appendChild(x);

        // Attribute TYPE input creator
        var attr_type_place = document.getElementsByName('placeForAttrType')[0];
        var attr_type_div = document.createElement('div');
        var attr_type_select = document.createElement('select');

        attr_type_div.className = 'form-group';

        attr_type_place.appendChild(attr_type_div);

        var x = document.createElement('option');
        var y = document.createElement('option');
        var z = document.createElement('option');
        var a = document.createElement('option');
        x.text = "integer";
        y.text = "string";
        z.text = "float";
        a.text = "Choose type";
        a.selected = 'true';
        attr_type_select.add(a);
        attr_type_select.add(x);
        attr_type_select.add(y);
        attr_type_select.add(z);
        attr_type_select.name = 'attributetype[]';
        attr_type_select.className = 'form-control';
        attr_type_div.appendChild(attr_type_select);
        // attr_type_select.options[attr_type_select.options.selectedIndex].selected = true;
        // var attr_type_input = document.createElement('div');
        // attr_type_input.className = 'form-group';
        // attr_type_place.appendChild(attr_type_input);
        // var y = document.createElement('input');
        // y.type = 'text';
        // y.className = 'form-control';
        // y.name = 'attributetype[]';
        // y.placeholder = 'Attribute type';
        // attr_type_input.appendChild(y);
    }
    </script>

    <script>

        function showProduct() {

            var el_one = document.getElementsByName('placeForPersonalisedProduct')[0];
            var el_two = document.getElementsByClassName('personalisedProduct')[0];
            var el_three = document.getElementsByClassName('preview-product')[0];

            if(el_three) {
                el_one.removeChild(el_three)
            } else if (el_two) {
                el_one.removeChild(el_two)
            } else {
                //
            }

            var a = document.querySelectorAll('input');
            var a_length = a.length - 11;
            var el = document.getElementsByName('placeForPersonalisedProduct')[0];
            var prod = document.createElement('div');
            prod.className = 'preview-product';

            for (var i = 4; i < a_length; i ++) {
                if (a[i].name == 'height') {
                    prod.style.height = a[i].value + "px";
                } else if (a[i].name == 'width') {
                    prod.style.width = a[i].value + "px";
                } else if (a[i].name == 'color' || a[i].name == 'background-color') {
                    prod.style.backgroundColor = a[i].value;
                } else if (a[i].name == 'border-width') {
                    prod.style.borderWidth = a[i].value + "px";
                } else if (a[i].name == 'border-color') {
                    prod.style.borderColor = a[i].value;
                } else if (a[i].name == 'border-style') {
                    prod.style.borderStyle = a[i].value;
                } else if (a[i].name == 'border-radius') {
                    prod.style.borderRadius = a[i].value + "px";
                }
            }
            el.appendChild(prod);
        }
    </script>

    <script>

        function showProductTwo() {

            var el_one = document.getElementsByName('placeForPersonalisedProduct')[0];
            var el_two = document.getElementsByClassName('personalisedProduct')[0];
            var el_three = document.getElementsByClassName('preview-product')[0];

            if(el_three) {
                el_one.removeChild(el_three)
            } else if (el_two) {
                el_one.removeChild(el_two)
            } else {
                //
            }

            var el = document.getElementsByName('placeForPersonalisedProduct')[0];
            var prod = document.createElement('div');
            prod.className = 'preview-product';

            var b = document.querySelectorAll('input');
            var b_length = b.length-10;

            for (var i = 3; i < b_length; i++ ) {
                if (b[i].name == 'height') {
                    prod.style.height = b[i].value + "px";
                } else if (b[i].name == 'width') {
                    prod.style.width = b[i].value + "px";
                } else if (b[i].name == 'color' || b[i].name == 'background-color') {
                    prod.style.backgroundColor = b[i].value;
                } else if (b[i].name == 'border-width') {
                    prod.style.borderWidth = b[i].value + "px";
                } else if (b[i].name == 'border-color') {
                    prod.style.borderColor = b[i].value;
                } else if (b[i].name == 'border-style') {
                    prod.style.borderStyle = b[i].value;
                } else if (b[i].name == 'border-radius') {
                    prod.style.borderRadius = b[i].value + "px";
                }
            }

            el.appendChild(prod)
        }
    </script>

    <script>

        function addInput(button_id) {
            var button_id = button_id;
            var find_div_form = document.getElementsByName(button_id)[0];

            var add_input = document.createElement('input');
            add_input.type = 'text';
            add_input.name = button_id + "[]";
            add_input.className = 'form-control';
            // find_div_form.appendChild(add_input);
            find_div_form.insertBefore(add_input, find_div_form.lastChild);

            // if button_id == width, height itp to type = number, else text


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
