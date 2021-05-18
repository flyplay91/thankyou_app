<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Dahsboard</title>

    <!-- Styles -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.12/datatables.min.css"/>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Script -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/b1eb609035.js" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.12/datatables.min.js"></script>
    <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
</head>

<body>
    <div id="wrapper">
        @auth
        <ul class="nav-sidebar">
            <img class="logo-img" src="/images/ff_logo_white.svg">
            <hr class="sidebar-divider">
            <li class="nav-item active">
                <a class="nav-link" href="/dashboard">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <hr class="sidebar-divider">
            <div class="sidebar-heading">
                Addons
            </div>
            <li class="nav-item">
                <a class="nav-link" href="/stores">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Stores</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/brands">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Brands</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/products">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Products</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/visitor-counts">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Store Visitor Counts</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/visitor-times">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Store Visitor Times</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/click-counts">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Store Click Counts</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/email-counts">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Store Email Counts</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/avarage-product-count-by-store">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Avarage Product Counts(by store)</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/avarage-product-count-by-brand">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Avarage Product Counts(by brand)</span>
                </a>
            </li>
        </ul>
        @endauth
        <div id="content-wrapper">
            <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
                <div class="container">
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ml-auto">
                            <!-- Authentication Links -->
                            @guest
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                                <!-- @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                    </li>
                                @endif -->
                            @else
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }} <span class="caret"></span>
                                        <img class="avatar-img" src="/images/profile_avatar.svg">
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('logout') }}">
                                            {{ __('Logout') }}
                                        </a>

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
        
    </div>
</body>
</html>