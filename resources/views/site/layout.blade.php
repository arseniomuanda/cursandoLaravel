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

            <a class="left brand-logo" href="{{ route('site.index') }}"><img src="{{ asset('img/logo.png') }}"
                    height="60px"></a>

            <ul id="nav-mobile" class="right">
                @auth
                    <li><a class='dropdown-trigger' href="" data-target='dw-user-option'>Olá
                            {{ auth()->user()->name }} <i class="material-icons right">expand_more</i></a>
                        <!-- Dropdown Structure -->
                        <ul id='dw-user-option' class='dropdown-content'>
                            <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                            <li><a href="{{ route('user.logout') }}">Logout</a></li>
                        </ul>
                    </li>
                @else
                    <li><a href="{{ route('login') }}">Sing In <i class="material-icons right">lock</i></a></li>
                @endauth
            </ul>
            <ul id="nav-mobile" class="right">
                <li><a href="{{ route('site.index') }}">Home</a></li>
                <!-- Dropdown Trigger -->
                <li><a class='dropdown-trigger' href="" data-target='dw-brand'>Marcas <i
                            class="material-icons right">expand_more</i></a>
                    <!-- Dropdown Structure -->
                    <ul id='dw-brand' class='dropdown-content'>
                        @foreach ($brandsMenu as $brand)
                            <li><a href="{{ route('site.brand', $brand->id) }}">{{ Str::ucfirst($brand->name) }}</a>
                            </li>
                        @endforeach

                    </ul>
                </li>
                <li>
                    <a class='dropdown-trigger' href="" data-target='dw-cat'>Categorias <i
                            class="material-icons right">expand_more</i></a>
                    <!-- Dropdown Structure -->
                    <ul id='dw-cat' class='dropdown-content'>
                        @foreach ($categoriesMenu as $category)
                            <li><a
                                    href="{{ route('site.category', $category->id) }}">{{ Str::ucfirst($category->name) }}</a>
                            </li>
                        @endforeach

                    </ul>
                </li>
                <li>
                    @auth
                        <a href="{{ route('site.cart') }}">Carrinho <span
                                class="new badge orange"data-badge-caption>{{ $cartList->count() }}</span></a>
                    </li>
                @endauth

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
