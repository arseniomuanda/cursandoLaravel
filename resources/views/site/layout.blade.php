<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    {{-- Iconnes --}}
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body>
    <nav class="red">
        <div class="nav-wrapper container">
            <a href="#" class="brand-logo center">Cruso de Laravel</a>
            <ul id="nav-mobile" class="left">
                <li><a href="{{ route('site.index') }}">Home</a></li>
                <!-- Dropdown Trigger -->
                <li><a class='dropdown-trigger' href="" data-target='dw-cat'>Categorias <i
                            class="material-icons right">expand_more</i></a>
                    <!-- Dropdown Structure -->
                    <ul id='dw-cat' class='dropdown-content'>
                        @foreach ($categoriesMenu as $category)
                            <li><a href="{{ route('site.category', $category->id) }}">{{ $category->name }}</a></li>
                        @endforeach

                    </ul>
                </li>
                <li><a href="{{ route('site.cart') }}">Carrinho</a></li>
            </ul>
        </div>
    </nav>
    @yield('content')
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('.dropdown-trigger');
            var instances = M.Dropdown.init(elems, {
                coverTrigger: false,
                constrainWidth: false
            });
        });
    </script>
</body>

</html>
