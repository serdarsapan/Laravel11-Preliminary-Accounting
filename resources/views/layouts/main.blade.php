<!DOCTYPE html>
{{--<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">--}}
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel Blog</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/main.css">
</head>
<style>
    .dropdown:hover .dropdown-menu-container {
        position: absolute;
        display: block;
        padding-top: 10px;
        z-index: 9;
    }
    .dropdown-menu-container {
        display: none;
    }
    .dropdown-item:hover {
        color: red;
    }
</style>
<body class="antialiased">

<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="collapse navbar-collapse d-flex justify-content-between" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <div class="btn-group">
                    @foreach($categories as $category)
                        @if($category->parent == null)
                            <div class="dropdown p-3">
                                <button type="button" class="dropdown-toggle" onclick="window.location.href = '{{ url('/category/' . $category->id) }}'"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{ $category->name }}
                                </button>
                                <div class="dropdown-menu-container" aria-labelledby="dropdownMenuButton">
                                    @foreach($categories as $childCategory)
                                        @if($childCategory->parent == $category->id)
                                            <a class="dropdown-item" href="{{ url('/category/'.$childCategory->id) }}">{{ $childCategory->name }}</a>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    @endforeach


                </div>
            </ul>
            <ul class="navbar-nav mr-2">
                @if (Route::has('login'))
                    @auth
                        <li class="nav-item">
                            <a href="{{ url('/admin') }}"
                               class="nav-link">Home</a>

                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/logout') }}"
                               class="nav-link">Log
                                Out</a>
                        </li>
                    @else
                    <li class="nav-item">
                            <a href="{{ url('/') }}"
                               class="nav-link">Home</a>

                        </li>
                        <li class="nav-item">
                            <a href="{{ route('login') }}"
                               class="nav-link">Log
                                in</a>
                        </li>
                    @endauth
                @endif
            </ul>
        </div>
    </nav>
</header>

@yield('content')

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
<script>
    $(document).ready(function(){
        $('.dropdown').on('show.bs.dropdown', function () {
            if($(this).find('.dropdown-menu').find('.dropdown-item').length > 0){
               //
            }else {
                $(this).find('.dropdown-menu').remove();
            }
        })
    })
</script>
</body>
</html>