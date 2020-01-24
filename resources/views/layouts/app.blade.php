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
        var attrNamePlace = document.getElementsByName('placeForAttrName')[0];
        var attrNameDiv = document.createElement('div');
        attrNameDiv.className = 'form-group';
        attrNamePlace.appendChild(attrNameDiv);
        var nameInput = document.createElement('input');
        nameInput.type = 'text';
        nameInput.className = 'form-control';
        nameInput.name = 'attributename[]';
        nameInput.placeholder = 'Attribute name';
        attrNameDiv.appendChild(nameInput);

        // Attribute TYPE input creator
        var attrTypePlace = document.getElementsByName('placeForAttrType')[0];
        var attrTypeDiv = document.createElement('div');
        var attrTypeSelect = document.createElement('select');
        attrTypeDiv.className = 'form-group';
        attrTypePlace.appendChild(attrTypeDiv);
        var optionOne = document.createElement('option');
        var optionTwo = document.createElement('option');
        var optionThree = document.createElement('option');
        var optionFour = document.createElement('option');
        optionOne.text = "integer";
        optionTwo.text = "string";
        optionThree.text = "float";
        optionFour.text = "Choose type";
        optionFour.selected = 'true';
        attrTypeSelect.add(optionFour);
        attrTypeSelect.add(optionOne);
        attrTypeSelect.add(optionTwo);
        attrTypeSelect.add(optionThree);
        attrTypeSelect.name = 'attributetype[]';
        attrTypeSelect.className = 'form-control';
        attrTypeDiv.appendChild(attrTypeSelect);
    }
    </script>
    <script>

        function addPreview() {

            var placeProduct = document.getElementsByName('placeForPersonalisedProduct')[0];
            var previewProduct = document.getElementsByClassName('preview-product')[0];

            if(previewProduct) {
                placeProduct.removeChild(previewProduct)
            } else {
                //
            }

            var preview = document.createElement('div');
            preview.className = 'preview-product';
            var inputTags = document.getElementsByTagName('select');
            var inputTagsLength = inputTags.length;

            // not finished, cannot read property 'name' of undefined
            for (var i = 0; i < 2; inputTags++) {
                if (inputTags[i].name == 'height') {
                    preview.style.height = inputTags[i].value + "px";
                } else if (inputTags[i].name == 'width') {
                    preview.style.width = inputTags[i].value + "px";
                } else if (inputTags[i].name == 'color' || inputTags[i].name == 'background-color') {
                    preview.style.backgroundColor = inputTags[i].value;
                } else if (inputTags[i].name == 'border-width') {
                    preview.style.borderWidth = inputTags[i].value + "px";
                } else if (inputTags[i].name == 'border-color') {
                    preview.style.borderColor = inputTags[i].value;
                } else if (inputTags[i].name == 'border-style') {
                    preview.style.borderStyle = inputTags[i].value;
                } else if (inputTags[i].name == 'border-radius') {
                    preview.style.borderRadius = inputTags[i].value + "px";
                } else {
                    //
                }
             }
             placeProduct.appendChild(preview);
        }

    </script>
    <script>

        function addInput(buttonId) {

            var buttonId = buttonId;
            var divForm = document.getElementsByName(buttonId)[0];
            var createdInput = document.createElement('input');

            createdInput.type = 'text';
            createdInput.name = buttonId + "[]";
            createdInput.className = 'form-control';
            divForm.insertBefore(createdInput, divForm.lastChild);
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
